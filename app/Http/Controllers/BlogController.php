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
        $artikels = artikel::with('galeri_artikel')->latest()->get();

        return view('admin.blog', compact('artikels'));
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


        if ($request->hasFile("gambar")) {

            $imageName = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->storeAs('images/galeri_artikel', $imageName, 'public');
            galeri_artikel::create([
                'id_artikel' => $artikel->id_artikel,
                'judul' => $validatedData['judul'],
                'deskripsi' => $validatedData['konten'],
                'url_media' => 'images/galeri_artikel/' . $imageName,
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
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|max:100',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cari artikel berdasarkan ID
        $artikel = artikel::find($id);
        

        if (!$artikel) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }

        // Update data artikel
        $artikel->update([
            'judul' => $validatedData['judul'],
            'konten' => $validatedData['konten'],
        ]);

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Cari gambar lama berdasarkan artikel
            $oldImage = galeri_artikel::where('id_artikel', $artikel->id_artikel)->first();

            // Jika gambar lama ada, hapus gambar lama tersebut
            if ($oldImage) {
                // Hapus file gambar lama
                Storage::delete('public/' . $oldImage->url_media);

                // Update data galeri_artikel
                $oldImage->update([
                    'judul' => $validatedData['judul'],
                    'deskripsi' => $validatedData['konten'],
                    'url_media' => $this->storeImage($request), // Simpan gambar baru
                ]);
            } else {
                // Jika gambar belum ada, buat data galeri_artikel baru
                galeri_artikel::create([
                    'id_artikel' => $artikel->id, // Pastikan id_artikel diisi dengan benar
                    'judul' => $validatedData['judul'],
                    'deskripsi' => $validatedData['konten'],
                    'url_media' => $this->storeImage($request), // Simpan gambar baru
                ]);
            }
        }

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Artikel berhasil diupdate!');
    }

    // Fungsi untuk menyimpan gambar
    private function storeImage(Request $request)
    {
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Simpan gambar ke folder public/images/galeri_artikel
        $image->storeAs('images/galeri_artikel', $imageName, 'public');

        return 'images/galeri_artikel/' . $imageName;
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



    public function indexPublic(Request $request) {    
        // Ambil keyword dari input
        $keyword = $request->input('keyword');
    
        // Filter artikel berdasarkan keyword jika ada
        $query = artikel::with('galeri_artikel');
        if ($keyword) {
            $query->where('judul', 'like', '%' . $keyword . '%');
        }
    
        // Ambil semua artikel berdasarkan filter atau tidak
        $allBlogs = $query->latest()->get();
    
        // Tentukan top blog
        $topBlog = $allBlogs->first();
    
        // Jika tidak ada artikel, kembalikan view kosong atau pesan
        if (!$topBlog) {
            return view('user.blog', [
                'topBlog' => null,
                'middleBlogs' => collect(),
                'remainingBlogs' => collect()
            ]);
        }
    
        // Ambil middleBlogs (3 artikel setelah top blog)
        $middleBlogs = $allBlogs
            ->where('id_artikel', '<', $topBlog->id_artikel)
            ->take(3);
    
        // Ambil remainingBlogs (sisanya)
        $remainingBlogs = $allBlogs
            ->whereNotIn('id_artikel', $middleBlogs->pluck('id_artikel')->push($topBlog->id_artikel));
            
        return view('user.blog', compact('topBlog', 'middleBlogs', 'remainingBlogs'));
    }
    

    public function show($id) {
        $artikel = artikel::with('galeri_artikel')->find($id);

        if (!$artikel) {
            return redirect()->route('blog')->with('error', 'Artikel tidak ditemukan.');
        }

        return view('user.showBlog', compact('artikel'));
    }
}
