<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\galeri_dokter;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Dokter::with('galeri_dokter')->get();
        return view('admin.doctor', compact('dokter' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
        ]);

        // Create the doctor
        $dokter = Dokter::create([
            'nama' => $validatedData['nama'],
            'jadwal' => json_encode($validatedData['jadwal']), // Simpan jadwal sebagai JSON
            'jadwal_awal' => $validatedData['jadwal_awal'],
            'jadwal_akhir' => $validatedData['jadwal_akhir'],
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->storeAs('public/galeri_dokter', $imageName);
            galeri_dokter::create([
                'id_dokter' => $dokter->id,
                'judul' => $validatedData['nama'],
                'deskripsi' => json_encode($validatedData['jadwal']),
                'url_media' => 'images/galeri_dokter/' . $imageName,
            ]);
        }

        return redirect()->route('admin.doctor')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jadwal_awal' => 'required|date_format:H:i',
            'jadwal_akhir' => 'required|date_format:H:i|after:jadwal_awal',
        ]);

        $dokter = Dokter::find($id);

        if (!$dokter) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $dokter->update([
            'nama' => $validatedData['nama'],
            'jadwal' => json_encode($validatedData['jadwal']),
            'jadwal_awal' => $validatedData['jadwal_awal'],
            'jadwal_akhir' => $validatedData['jadwal_akhir'],
        ]);

        // Handle image upload if provided
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            $galeri = galeri_dokter::where('id_dokter', $dokter->id)->first();
            if ($galeri) {
                Storage::delete('public/' . $galeri->url_media);
                $galeri->delete();
            }

            $imageName = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/galeri_dokter', $imageName);

            galeri_dokter::create([
                'id_dokter' => $dokter->id,
                'judul' => $validatedData['nama'],
                'deskripsi' => json_encode($validatedData['jadwal']),
                'url_media' => 'galeri_dokter/' . $imageName,
            ]);
        }

        return redirect()->back()->with('success', 'Dokter berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::find($id);
        
        if ($dokter) {
            $galeri = galeri_dokter::where('id_dokter', $id)->get();
            foreach ($galeri as $galeriItem) {
                Storage::delete('public/' . $galeriItem->url_media);
                $galeriItem->delete();
            }
            $dokter->delete();
        }
        return redirect()->back()->with('success', 'Dokter berhasil dihapus!');
    }
}