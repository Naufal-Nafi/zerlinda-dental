<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\galeri_dokter;
use Illuminate\Support\Facades\Storage;

class DoctorController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Dokter::all();
        return view('admin.doctor', compact('dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'required',
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jadwal_awal'=>'required',
            'jadwal_akhir'=>'required',
        ]);

        $dokter = dokter::create([
            'nama' => $validatedData['nama'],
            'jadwal' => json_encode($validatedData['jadwal']),
            'jadwal_awal' => $validatedData['jadwal_awal'],
            'jadwal_akhir' => $validatedData['jadwal_akhir'],
        ]);

        $foreignKey = 'id_dokter';

        if ($request->gambar) {
            $imageName = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->storeAs('public/galeri_dokter', $imageName);
            galeri_dokter::create([
                'id_dokter' => $dokter->id_dokter,
                'judul' => $validatedData['nama'],
                'deskripsi' => $validatedData['jadwal'],
                'url_media' => 'galeri_dokter/' . $imageName,
                $foreignKey => $dokter[$foreignKey],
            ]);
        }
        return redirect()->route('admin.doctor')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'gambar' => 'required',
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jadwal_awal'=>'required',
            'jadwal_akhir'=>'required',
        ]);

        $dokter = dokter::find($id);

        if (!$dokter){
            return redirect()->back()->with('error', 'data tidak ditemukan');
        }

        $dokter->update([
            'nama' => $validateData['nama'],
            'jadwal' => json_encode($validateData['jadwal']),
            'jadwal_awal'=> $validateData['jadwal_awal'],
            'jadwal_akhir'=> $validateData['jadwal_akhir']

        ]);

        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imagesname = time().'.'. $images->getClientOriginalExtension();
            $images->move(public_path('galeri_dokter'), $imagesname);

            $galeri = galeri_dokter::find($dokter->id_galeri);
            $galeri->update([
                'judul' => $validateData['nama'],
                'deskripsi' => $validateData['jadwal'],
                'url_media' => 'galeri_dokter/' . $imagesname,
            ]);
        }
        return redirect()->back()->with('success', 'Dokter berhasil diupdate!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
                Storage::delete('public/galeri_dokter/' . basename($galeriItem->url_media));
                $galeriItem->delete();
            }
            $dokter->delete();
        }
        return redirect()->back()->with('success', 'Dokter berhasil dihapus!');
    }
}
