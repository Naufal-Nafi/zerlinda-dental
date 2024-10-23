<?php

namespace App\Http\Controllers;

use App\Models\layanan_anak;
use App\Models\layanan_dewasa;
use App\Models\LayananAnak;
use App\Models\LayananDewasa;


use Illuminate\Http\Request;

class ServiceController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = layanan_anak::all()->concat(layanan_dewasa::all());
        return view('admin.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $serviceAnak = new layanan_anak();
        $serviceAnak->nama_layanan = $validated['nama_layanan'];
        $serviceAnak->deskripsi = $validated['deskripsi'];
        
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('services', 'public');
            $serviceAnak->gambar = $imagePath;
        }
        
        $serviceAnak->save();
        
        $serviceDewasa = new layanan_dewasa();
        $serviceDewasa->nama_layanan = $validated['nama_layanan'];
        $serviceDewasa->deskripsi = $validated['deskripsi'];
        
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('services', 'public');
            $serviceDewasa->gambar = $imagePath;
        }
        
        $serviceDewasa->save();

        return redirect()->route('admin.service')->with('success', 'Data layanan berhasil ditambahkan.');
        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serviceAnak = layanan_anak::findOrFail($id);
        $serviceDewasa = layanan_dewasa::findOrFail($id);
        return view('admin.service-edit', compact('serviceAnak', 'serviceDewasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $serviceAnak = layanan_anak::findOrFail($id);
        $serviceDewasa = layanan_dewasa::findOrFail($id);
    
        $serviceAnak->update($validated);
        $serviceDewasa->update($validated);
    
        return redirect()->route('admin.service')->with('success', 'Data layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceAnak = layanan_anak::findOrFail($id);
        $serviceDewasa = layanan_dewasa::findOrFail($id);

        $serviceAnak->delete();
        $serviceDewasa->delete();

        return redirect()->route('admin.service')->with('success', 'Data layanan berhasil dihapus.');
    }
}
