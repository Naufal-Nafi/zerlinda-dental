<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landing_page;
use Illuminate\Support\Facades\Storage;

class LandingPageController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landingpages = landing_page::all();
        return view('admin.landingpage', compact('landingpages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'keterangan' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Simpan gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('landing_page', $fileName, 'public');
    
            // Simpan data ke database tanpa $filePath
            $image = landing_page::create([
                'keterangan' => $request->keterangan,
                'url_media' => 'landing_page/' . $fileName, // URL relatif
            ]);            
    
            return back()->with('success', 'Gambar berhasil diupload!')->with('image', $image);
        }
    }

    
    public function destroy($id)
    {
        $landingpage = landing_page::find($id);

        if ($landingpage) {
            $landingpage->delete();
                      
            Storage::delete($landingpage->url_media);

            return redirect()->back()->with('success', 'Landing page berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Landing page tidak ditemukan!');
        }
    }
}