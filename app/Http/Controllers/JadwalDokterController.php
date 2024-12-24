<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Storage;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $dokterList = Dokter::simplePaginate(5);

        return view('admin.doctor', compact('dokterList'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jadwal' => 'array', // Validasi array utama
        ]);

        // Validasi manual untuk elemen `jadwal` menggunakan loop
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
        $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('gambar_dokter', 'public') : null;

        // Menyimpan data dokter dengan jadwal dalam bentuk JSON
        Dokter::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'jadwal' => $request->jadwal, // Array akan diubah ke JSON
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil disimpan!');
    }

    public function destroy($id)
    {
        // Cari jadwal berdasarkan ID
        $jadwal = Dokter::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($jadwal->gambar) {
            // dd($jadwal->gambar);
            Storage::delete($jadwal->gambar);
        }

        // Hapus data jadwal dari database
        $jadwal->delete();

        // Kembali ke halaman sebelumnya
        return back();
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jadwal' => 'required|array',
            'jadwal.*.hari' => 'required|string',
            'jadwal.*.jadwal_awal' => 'required|date_format:H:i',
            'jadwal.*.jadwal_akhir' => 'required|date_format:H:i',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);
        
        // Temukan dokter berdasarkan ID
        $dokter = Dokter::findOrFail($id);

        // Handle gambar jika diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($dokter->gambar) {                
                Storage::delete( $dokter->gambar);
            }

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('gambar_dokter', 'public');
            $gambarName = $gambarPath; // Hanya ambil nama file
        } else {
            $gambarName = $dokter->gambar; // Pertahankan gambar lama
        }

        // Update data dokter
        $dokter->update([
            'nama' => $request->input('nama'),
            'jadwal' => $request->jadwal,
            'gambar' => $gambarName,
        ]);

        return redirect()->back();
    }
}
