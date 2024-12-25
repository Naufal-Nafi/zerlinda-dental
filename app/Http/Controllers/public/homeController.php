<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\kontak;
use App\Models\layanan;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $images = \App\Models\landing_page::all();
        $artikels = artikel::latest()->limit(6)->get();

        $layanan2_anak = layanan::with('galeri_layanan')
            ->where('jenis_layanan', 'anak')
            ->take(2)
            ->get();
        
        $layanan2_dewasa = layanan::with('galeri_layanan')
            ->where('jenis_layanan', 'dewasa')
            ->take(2)
            ->get();
        
        $layanan2_umum = layanan::with('galeri_layanan')
            ->where('jenis_layanan', 'umum')
            ->take(2)
            ->get();

        $contacts = kontak::all();   
        
        return view('user.home', compact('images', 'artikels','layanan2_anak','layanan2_dewasa', 'layanan2_umum', 'contacts'));
    }     
}
