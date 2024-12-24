<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = artikel::latest()->get();
        return view('admin.blog', compact('artikels'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:100',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile("gambar")) {
            $imageName = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->storeAs('galeri_artikel', $imageName, 'public');
            $gambar = 'galeri_artikel/' . $imageName;
        }

        artikel::create([
            'judul' => $validatedData['judul'],
            'konten' => $validatedData['konten'],
            'url_media' => $gambar
        ]);

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

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->url_media) {
                Storage::delete($artikel->url_media);
            }

            // Simpan gambar baru dan update kolom `url_media`
            $gambarBaru = $request->file('gambar')->store('galeri_artikel', 'public');
            $gambar = 'galeri_artikel/' . $gambarBaru;
            $artikel->url_media = $gambar;
        }

        // Update judul dan konten artikel
        $artikel->judul = $validatedData['judul'];
        $artikel->konten = $validatedData['konten'];

        // Simpan perubahan pada artikel
        $artikel->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Artikel berhasil diupdate!');
    }


    // Fungsi untuk menyimpan gambar
    private function storeImage(Request $request)
    {
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Simpan gambar ke folder public/images/galeri_artikel
        $image->storeAs('galeri_artikel', $imageName, 'public');

        return 'galeri_artikel/' . $imageName;
    }


    public function destroy(string $id)
    {
        // Cari artikel berdasarkan ID
        $artikel = artikel::find($id);

        if ($artikel) {
            // Hapus file gambar jika ada
            if ($artikel->url_media) {
                Storage::delete($artikel->url_media);
            }
            // Hapus artikel
            $artikel->delete();

            return redirect()->back()->with('success', 'Artikel berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }
    }
}