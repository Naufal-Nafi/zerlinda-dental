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

        $layanan_anak->each(function ($item) {
            $item->galeri_anak = $item->galeri_anak->first();
        });
        $layanan_dewasa->each(function ($item) {
            $item->galeri_dewasa = $item->galeri_dewasa->first();
        });

        $services = collect([$layanan_anak, $layanan_dewasa])
            ->reduce(function ($carry, $item) {
                return $carry->merge($item);
            }, collect());

        

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



        $layanan = $layananModel::create([
            'nama_layanan' => $validatedData['nama_layanan'],
            'deskripsi' => $validatedData['deskripsi']
        ]);


        if ($request->gambar) {
            foreach ($request->gambar as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Store each image in the 'public/images/layanan' folder
                $image->storeAs('public/images/layanan', $imageName, 'public');

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
            'tipe_layanan' => 'required|in:anak,dewasa',
        ]);

        // Tentukan model layanan dan galeri berdasarkan tipe layanan
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

        // Ambil data layanan berdasarkan ID
        $currentLayanan = layanan_anak::find($id) ?? layanan_dewasa::find($id);

        if (!$currentLayanan) {
            return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }

        // Jika tipe layanan berubah, pindahkan data
        $currentTipeLayanan = $currentLayanan instanceof layanan_anak ? 'anak' : 'dewasa';
        if ($currentTipeLayanan !== $request->tipe_layanan) {
            // Tentukan model tujuan
            $destinationModel = $request->tipe_layanan === 'anak' ? layanan_anak::class : layanan_dewasa::class;
            $destinationGaleriModel = $request->tipe_layanan === 'anak' ? galeri_anak::class : galeri_dewasa::class;

            // Pindahkan layanan
            $newLayanan = $destinationModel::create([
                'nama_layanan' => $currentLayanan->nama_layanan,
                'deskripsi' => $currentLayanan->deskripsi,
            ]);

            // Pindahkan galeri jika ada
            $currentGaleri = $currentLayanan->galeri; // Asumsi ada relasi galeri
            if ($currentGaleri) {
                $destinationGaleriModel::create([
                    'judul' => $currentGaleri->judul,
                    'deskripsi' => $currentGaleri->deskripsi,
                    'url_media' => $currentGaleri->url_media,
                    'layanan_id' => $newLayanan->id,
                ]);
            }

            // Hapus data lama
            $currentGaleri?->delete();
            $currentLayanan->delete();

            return redirect()->back()->with('success', 'Data berhasil dipindahkan.');
        }

        // Update data jika tipe layanan tetap
        $currentLayanan->update([
            'nama_layanan' => $validatedData['nama_pelayanan'],
            'deskripsi' => $validatedData['deskripsi']
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/layanan'), $imageName);

            $galeri = $galeriModel::find($currentLayanan->id_galeri);
            $galeri->update([
                'judul' => $validatedData['nama_pelayanan'],
                'deskripsi' => $validatedData['deskripsi'],
                'url_media' => 'images/layanan/' . $imageName
            ]);
        }

        return redirect()->back()->with('success', 'Data layanan berhasil diperbarui.');

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
