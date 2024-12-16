<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\kontak;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index(Request $request) {    
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

        $contacts = kontak::all();
            
        return view('user.blog', compact('topBlog', 'middleBlogs', 'remainingBlogs', 'contacts'));
    }
    

    public function show($id) {
        $artikel = artikel::with('galeri_artikel')->find($id);

        if (!$artikel) {
            return redirect()->route('blog')->with('error', 'Artikel tidak ditemukan.');
        }

        $contacts = kontak::all();

        return view('user.showBlog', compact('artikel', 'contacts'));
    }

    
}
