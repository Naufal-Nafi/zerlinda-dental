<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kontak;

class ContactController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_kontak' => 'required',
            'nama_akun' => 'required',
            'url' => 'required',
        ]);
        kontak::create($validateData);
        return redirect()->back()->with('success', 'Kontak berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $validateData = $request->validate([
            'jenis_kontak' => 'required',
            'nama_akun' => 'required',
            'url' => 'required',
        ]);

        $kontak = kontak::find($id);

        $kontak->update([
            'jenis_kontak' => $validateData['jenis_kontak'],
            'nama_akun' => $validateData['nama_akun'],
            'url' => $validateData['url']
        ]);
        return redirect()->back()->with('success', 'Kontak berhasil diupdate!');
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
        //
    }
}
