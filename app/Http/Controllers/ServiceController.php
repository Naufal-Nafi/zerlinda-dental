<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan_anak;
use App\Models\layanan_dewasa;
use App\Models\galeri_anak;
use App\Models\galeri_dewasa;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        
        $layanan_anak = layanan_anak::with("galeri_anak")->get();
        $layanan_dewasa = layanan_dewasa::with("galeri_dewasa")->get();
        $services = $layanan_anak->merge($layanan_dewasa);
        
        return view('admin.service', compact('services', 'layanan_anak', 'layanan_dewasa'));
    }

    public function store(Request $request)
{


    $validatedData = $request->validate([
        
        'nama_layanan' => 'required|max:100',
        'deskripsi' => 'required',
        'gambar.*   ' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'tipe_layanan' => 'required|in:anak,dewasa'
    ]);

    switch ($request->tipe_layanan) {
        case 'anak':
            $galeriModel = galeri_anak::class;
            $layananModel = layanan_anak::class;
            $foreignKey = 'id_layanan_ank';
            break;
        case 'dewasa':
            $galeriModel = galeri_dewasa::class;
            $layananModel = layanan_dewasa::class;
            $foreignKey = 'id_layanan_dws';
            break;
        default:
            // Handle invalid tipe_layanan value
            throw new \Exception('Invalid tipe_layanan value');
    }
    

    
    $layanan=$layananModel::create([
        'nama_layanan' => $validatedData['nama_layanan'],
        'deskripsi' => $validatedData['deskripsi']
    ]);

    
    if ($request->gambar) {
        foreach ($request->gambar as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Store each image in the 'public/images/layanan' folder
            $image->storeAs('public/images/layanan', $imageName);
            
            // Create galeri entry for each image
            $galeriModel::create([
                'judul' => $validatedData['nama_layanan'],
                'deskripsi' => $validatedData['deskripsi'],
                'url_media' => 'images/layanan/' . $imageName, // Laravel will use the 'storage' symlink
                $foreignKey => $layanan[$foreignKey]
            ]);
        }
    }

    return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
}

    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_pelayanan' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tipe_layanan' => 'required|in:anak,dewasa'
        ]);
    
        switch ($request->tipe_layanan) {
            case 'anak':
                $layananModel = layanan_anak::class;
                $galeriModel = galeri_anak::class;
                break;
            case 'dewasa':
                $layananModel = layanan_dewasa::class;
                $galeriModel = galeri_dewasa::class;
                break;
            default:
                throw new \Exception('Invalid tipe_layanan value');
        }
    
        $layanan = $layananModel::find($id);
    
        if (!$layanan) {
            return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }
    
        $layanan->update([
            'nama_pelayanan' => $validatedData['nama_pelayanan'],
            'deskripsi' => $validatedData['deskripsi']
        ]);
    
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/layanan'), $imageName);
    
            $galeri = $galeriModel::find($layanan->id_galeri);
            $galeri->update([
                'judul' => $validatedData['nama_pelayanan'],
                'deskripsi' => $validatedData['deskripsi'],
                'url_media' => 'images/layanan/' . $imageName
            ]);
        }
    
        return redirect()->back()->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $tipe_layanan = layanan_anak::find($id);

    if ($tipe_layanan) {
        $galeri_anak = galeri_anak::where('id_layanan_ank', $id)->get();
        foreach ($galeri_anak as $galeri) {
            Storage::delete('public/images/layanan/' . basename($galeri->url_media));
            $galeri->delete();
        }
        $tipe_layanan->delete();
    } else {
        $tipe_layanan = layanan_dewasa::find($id);
        
        if ($tipe_layanan) {
            $galeri_dewasa = galeri_dewasa::where('id_layanan_dws', $id)->get();
            foreach ($galeri_dewasa as $galeri) {
                Storage::delete('public/images/layanan/' . basename($galeri->url_media));
                $galeri->delete();
            }
            $tipe_layanan->delete();
        } else {
            return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }
    }

    return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
}
