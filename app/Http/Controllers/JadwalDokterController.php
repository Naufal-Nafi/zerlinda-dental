<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $dokterList = Dokter::latest()->simplePaginate(5);

        return view('admin.doctor', compact('dokterList'));
    }
    public function store(Request $request)
    {        
        // Validasi input
        $request->validate([
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
            Storage::delete( $jadwal->gambar);
        }

        // Hapus data jadwal dari database
        $jadwal->delete();

        // Kembali ke halaman sebelumnya
        return back()->with('success', 'Dokter berhasil dihapus!');
    }

    public function update(Request $request, $id) {
        $dokter = Dokter::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jadwal' => 'array',
        ]);

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

        // Menangani unggahan gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($dokter->gambar) {
                Storage::delete($dokter->gambar);
            }
            $gambarPath = $request->file('gambar')->store('gambar_dokter', 'public');
            $validatedData['gambar'] = $gambarPath;
        }

        // Memperbarui data dokter
        $dokter->update($validatedData);

        return redirect()->back()->with('success', 'Dokter berhasil diperbarui!');
    }


}