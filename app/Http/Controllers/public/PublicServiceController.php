<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\kontak;
use App\Models\layanan;
use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function adultService()
    {
        $contacts = kontak::all();
        $services = layanan::where('jenis_layanan', 'dewasa')->get();

        return view('user.service_adult', compact('services', 'contacts'));
    }

    public function childService()
    {
        $contacts = kontak::all();
        $services = layanan::where('jenis_layanan', 'anak')->get();

        return view('user.service_child', compact('services', 'contacts'));
    }

    public function show($id)
    {
        $contacts = kontak::all();

        // Ambil layanan berdasarkan ID
        $service = layanan::with('galeri_layanan')->findOrFail($id);        

        // Ambil semua gambar dari galeri kecuali yang pertama
        $images = $service->galeri_layanan->skip(1)->pluck('url_media');

        return view('user.showService', compact('service', 'images', 'contacts'));
    }
}

