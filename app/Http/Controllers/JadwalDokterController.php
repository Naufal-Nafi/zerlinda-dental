<?php

namespace App\Http\Controllers;

use App\Models\Dokterr;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $dokterList = Dokterr::all();

        return view('admin.doctor', compact('dokterList'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jadwal' => 'array', // Validasi array utama
        ]);
        // dd(true);
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
        
        // dd(true);
        // Menyimpan gambar jika ada
        $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('gambar_dokter', 'public') : null;

        // Menyimpan data dokter dengan jadwal dalam bentuk JSON
        Dokterr::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'jadwal' => $request->jadwal, // Array akan diubah ke JSON
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil disimpan!');
    }
}
