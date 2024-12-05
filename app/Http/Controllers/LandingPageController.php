<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landing_page;

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
            $file->move(public_path('uploads'), $fileName); // Simpan langsung di 'public/uploads'
    
            // Simpan data ke database tanpa $filePath
            $image = landing_page::create([
                'keterangan' => $request->keterangan,
                'url_media' => 'uploads/' . $fileName, // URL relatif
            ]);

               
    
            return back()->with('success', 'Gambar berhasil diupload!')->with('image', $image);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $landingpage = landing_page::find($id);

        if ($landingpage) {
            $validate_data=$request->validate([
                
                'keterangan' => 'required',
                'url_gambar' => 'required'
            ]);

            
            $landingpage->keterangan = $validate_data['keterangan'];
            $landingpage->url_gambar = $validate_data['url_gambar'];

            if ($request->hasFile('url_gambar')) {
                $images = $request->file('url_gambar');
                $imagesname = time().'.'. $images->getClientOriginalExtension();
                $images->move(public_path('landing_page'), $imagesname);
                $landingpage->url_gambar = $imagesname;
            }

            $landingpage->save();

            return redirect()->back()->with('success', 'Landing page berhasil diupdate!');
        } else {
            return redirect()->back()->with('error', 'Landing page tidak ditemukan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $landingpage = landing_page::find($id);

        if ($landingpage) {
            $landingpage->delete();

            // Hapus gambar dari direktori
            $gambar = public_path('landing_page/'.$landingpage->url_gambar);
            if (file_exists($gambar)) {
                unlink($gambar);
            }

            return redirect()->back()->with('success', 'Landing page berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Landing page tidak ditemukan!');
        }
    }
}