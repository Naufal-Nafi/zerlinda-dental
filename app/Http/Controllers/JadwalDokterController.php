<?php

namespace App\Http\Controllers;

use App\Models\Dokterr;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $dokterList = Dokterr::all();
        foreach ($dokterList as $dokter) {
            $dokter->jadwal = json_decode($dokter->jadwal, true) ?? [];
        }
        

        return view('admin.doctor', compact('dokterList'));
    }
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'jadwal' => 'array', // Validasi array utama
    ]);

    // Validasi manual untuk elemen `jadwal`
    foreach ($request->jadwal as $day => $schedule) {
        if (isset($schedule['jadwal_awal']) || isset($schedule['jadwal_akhir'])) {
            if (!$schedule['jadwal_awal'] || !$schedule['jadwal_akhir']) {
                throw ValidationException::withMessages([
                    "jadwal.$day.jadwal_awal" => 'Jam mulai diperlukan jika jam akhir diisi.',
                    "jadwal.$day.jadwal_akhir" => 'Jam akhir diperlukan jika jam mulai diisi.',
                ]);
            }

            if (strtotime($schedule['jadwal_awal']) >= strtotime($schedule['jadwal_akhir'])) {
                throw ValidationException::withMessages([
                    "jadwal.$day.jadwal_akhir" => 'Jam akhir harus setelah jam mulai.',
                ]);
            }
        }
    }

    // Menyimpan gambar jika ada
    $gambarPath = $request->hasFile('gambar') 
        ? $request->file('gambar')->store('gambar_dokter', 'public') 
        : null;

    // Menyimpan data dokter dengan jadwal dalam bentuk JSON
    Dokterr::create([
        'nama' => $request->nama,
        'gambar' => $gambarPath,
        'jadwal' => json_encode($request->jadwal ?? []),
    ]);

    return redirect()->back()->with('success', 'Jadwal berhasil disimpan!');
}


    public function destroy($id)
    {
        // Cari jadwal berdasarkan ID
        $jadwal = Dokterr::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($jadwal->gambar) {
            // dd($jadwal->gambar);
            Storage::delete( $jadwal->gambar);
        }

        // Hapus data jadwal dari database
        $jadwal->delete();

        // Kembali ke halaman sebelumnya
        return back();
    }

    public function update(Request $request,$id) {
        dd($request->all());
        Dokterr::findOrFail($id);
    }

}