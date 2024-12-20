<?php

namespace App\Http\Controllers;

use App\Models\galeri_layanan;
use App\Models\layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = layanan::with("galeri_layanan")->get();
        // dd($services->first()->galeri_layanan->first()->url_media);
        return view('admin.service', compact('services'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_layanan' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tipe_layanan' => 'required|in:anak,dewasa' // Enum: anak atau dewasa
        ]);

        

        // Buat layanan baru
        $layanan = layanan::create([
            'nama_layanan' => $validatedData['nama_layanan'],
            'deskripsi' => $validatedData['deskripsi'],
            'jenis_layanan' => $validatedData['tipe_layanan'] // Enum anak/dewasa
        ]);

        // Proses gambar dan simpan ke tabel galeri_layanan
        if ($request->gambar) {
            foreach ($request->gambar as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Simpan gambar ke folder 'public/images/layanan'
                $image->storeAs('public/images/layanan', $imageName, 'public');

                // Buat entry di tabel galeri_layanan
                galeri_layanan::create([
                    'judul' => $validatedData['nama_layanan'],
                    'deskripsi' => 'deskripsi',
                    'url_media' => 'images/layanan/' . $imageName, // Path ke gambar
                    'id_layanan' => $layanan->id_layanan // Foreign key ke tabel layanan
                ]);
            }
        }

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');

    }

    public function update(Request $request, $id)
    {
        
        // Temukan layanan yang sesuai dengan ID
        $service = layanan::findOrFail($id);
        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'nama_pelayanan' => 'required|max:100',
            'deskripsi' => 'required',
            'tipe_layanan' => 'required|in:anak,dewasa',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048', 
            'gambar_hapus' => 'array',
            'gambar_hapus.*' => 'integer', 
            'gambar_1' => 'image|mimes:jpeg,png,jpg|max:2048', 
        ]);
        
        
        // Update data layanan
        $service->nama_layanan = $validated['nama_pelayanan'];
        $service->deskripsi = $validated['deskripsi'];
        $service->jenis_layanan = $validated['tipe_layanan'];

        // jika gambar utama ada perubahan
        if ($request->hasFile('gambar_1')) {
            $image = $validated['gambar_1'];            
            $topImage = $service->galeri_layanan->first();
            
            Storage::delete($topImage->url_media);

            $imageName = time() . '_' . $image->getClientOriginalName();                
            $image->storeAs('public/images/layanan', $imageName, 'public');

            $topImage->url_media = 'images/layanan/' . $imageName;
            $topImage->save();
        }
        
        //jika gambar ada yang dihapus
        if ($request->has('gambar_hapus')) {            
            $imagesToDelete = galeri_layanan::whereIn('id_galeri', $validated['gambar_hapus'])->get();
            foreach ($imagesToDelete as $image) {                
                Storage::delete('public/'.$image->url_media);
                $image->delete();
            }
        }
        
        // jika ada gambar baru
        if ($request->gambar) {
            foreach ($request->gambar as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Simpan gambar ke folder 'public/images/layanan'
                $image->storeAs('public/images/layanan', $imageName, 'public');

                // Buat entry di tabel galeri_layanan
                galeri_layanan::create([
                    'judul' => $validated['nama_pelayanan'],
                    'deskripsi' => $validated['deskripsi'],
                    'url_media' => 'images/layanan/' . $imageName, // Path ke gambar
                    'id_layanan' => $service->id_layanan // Foreign key ke tabel layanan
                ]);
            }
            $service->save();
        }
        
        // Redirect dengan pesan sukses
        return redirect()->route('admin.service')->with('success', 'Layanan berhasil diperbarui.');
    }




    public function destroy($id)
    {
        // Cari layanan berdasarkan ID
        $layanan = layanan::find($id);

        if ($layanan) {
            // Ambil semua galeri terkait layanan ini
            $galeriLayanan = galeri_layanan::where('id_layanan', $id)->get();

            // Hapus setiap file gambar dari storage dan hapus galeri
            foreach ($galeriLayanan as $galeri) {
                Storage::delete('public/images/layanan/' . basename($galeri->url_media));
                $galeri->delete();
            }

            // Hapus layanan
            $layanan->delete();

            return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
    }

}
