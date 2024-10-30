<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan_anak;
use App\Models\layanan_dewasa;
use App\Models\Galeri;

class ServiceController extends Controller
{
    public function index()
    {
        $layanan_anak = layanan_anak::all();
        $layanan_dewasa = layanan_dewasa::all();
        $services = $layanan_anak->merge($layanan_dewasa);

        return view('admin.service', compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tipe_layanan' => 'required|in:anak,dewasa'
        ]);

        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/layanan'), $imageName);

        $galeri = Galeri::create([
            'judul' => $validatedData['nama_layanan'],
            'deskripsi' => $validatedData['deskripsi'],
            'url_media' => 'images/layanan/' . $imageName,
        ]);

        if ($request->tipe_layanan == 'anak') {
            layanan_anak::create([
                'id_galeri' => $galeri->id_galeri,
                'nama_layanan' => $validatedData['nama_layanan'],
                'deskripsi' => $validatedData['deskripsi']
            ]);
        } else {
            layanan_dewasa::create([
                'id_galeri' => $galeri->id_galeri,
                'nama_layanan' => $validatedData['nama_layanan'],
                'deskripsi' => $validatedData['deskripsi']
            ]);
        }

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tipe_layanan' => 'required|in:anak,dewasa'
        ]);

        if ($request->tipe_layanan == 'anak') {
            $layanan = layanan_anak::find($id);
        } else {
            $layanan = layanan_dewasa::find($id);
        }

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/layanan'), $imageName);

            $galeri = Galeri::find($layanan->id_galeri);
            $galeri->judul = $validatedData['nama_layanan'];
            $galeri->deskripsi = $validatedData['deskripsi'];
            $galeri->url_media = "images/layanan/$imageName";
            $galeri->save();
        }

        $layanan->nama_layanan = $validatedData['nama_layanan'];
        $layanan->deskripsi = $validatedData['deskripsi'];
        
        $layanan->save();

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (request()->tipe_layanan == 'anak') {
            $layanan = layanan_anak::find($id);
        } else {
            $layanan = layanan_dewasa::find($id);
        }

        $galeri = Galeri::find($layanan->id_galeri);
        $galeri->delete();
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
}
