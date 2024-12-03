<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use App\Models\galeri_artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = artikel::paginate(5);
        return view('admin.blog',compact('artikel'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:100',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $artikel = artikel::create([
            'judul' => $validatedData['judul'],
            'konten' => $validatedData['konten'],
        ]);
    
        $foreignKey = 'id_artikel';
        
    
        if ($request->file("gambar")) {
            
            $destinationPath = 'images/galeri_artikel/';
            $imageName = time() . '_' . $request->file("gambar")->getClientOriginalName();
            galeri_artikel::create([
                            'id_artikel' => $artikel->id_artikel,
                            'judul' => $validatedData['judul'],
                            'deskripsi' => $validatedData['konten'],
                            'url_media' => $destinationPath . $imageName,
                            $foreignKey => $artikel[$foreignKey],
            ]);
        }
    
        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:100',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
    
        $artikel = artikel::find($id);
    
        if (!$artikel) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }
    
        $artikel->update([
            'judul' => $validatedData['judul'],
            'konten' => $validatedData['konten'],
        ]);

    
        if ($request->hasFile('gambar')) {
            $oldImage = galeri_artikel::where('id_artikel', $artikel->id)->first();
            if ($oldImage) {
                Storage::delete('public/' . $oldImage->url_media);
            }
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/galeri_artikel', $imageName,'public');
    
            if ($oldImage) {
                $oldImage->update([
                    'judul' => $validatedData['judul'],
                    'deskripsi' => $validatedData['konten'],
                    'url_media' => 'images/galeri_artikel/' . $imageName,
                ]);
            }
            else
            {
                
            galeri_artikel::Create(
                [
                    'id_artikel' => $artikel->id_artikel,
                    'judul' => $validatedData['judul'],
                    'deskripsi' => $validatedData['konten'],
                    'url_media' => 'images/galeri_artikel/' . $imageName,
                ]
            );}
        }
    
        return redirect()->back()->with('success', 'Artikel berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = artikel::find($id);
        if ($artikel) {
            $galeri = galeri_artikel::where('id_artikel', $id)->get();
            foreach ($galeri as $galeriItem) {
                Storage::delete('public/images/galeri_artikel/' . basename($galeriItem->url_media));
                $galeriItem->delete();
            }
            $artikel->delete();
        } else {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }
        return redirect()->back()->with('success', 'Artikel berhasil dihapus!');
    }

    

}
