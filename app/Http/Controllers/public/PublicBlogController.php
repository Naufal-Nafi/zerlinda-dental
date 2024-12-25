<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\kontak;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index(Request $request)
{
    $contacts = kontak::all();

    // Ambil keyword dari input
    $keyword = $request->input('keyword');

    // Filter artikel berdasarkan keyword jika ada
    $query = artikel::query();
    if ($keyword) {
        $query->where(function($q) use ($keyword) {
            $q->where('judul', 'like', '%' . $keyword . '%')
              ->orWhere('konten', 'like', '%' . $keyword . '%'); // Menambahkan pencarian di konten
        });
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
            'remainingBlogs' => collect(),
            'contacts' => $contacts,
            'keyword' => $keyword // Menambahkan keyword ke view
        ]);
    }

    // Ambil middleBlogs (3 artikel setelah top blog)
    $middleBlogs = artikel::where('id_artikel', '<', $topBlog->id_artikel)
        ->where(function($q) use ($keyword) {
            $q->where('judul', 'like', '%' . $keyword . '%')
              ->orWhere('konten', 'like', '%' . $keyword . '%');
        })
        ->latest('id_artikel')
        ->take(3)
        ->get();

    // Ambil remainingBlogs (sisanya)
    $excludedIds = $middleBlogs->pluck('id_artikel')->push($topBlog->id_artikel);

    // Gunakan query builder untuk menyaring data
    $remainingBlogs = artikel::whereNotIn('id_artikel', $excludedIds)
        ->where(function($q) use ($keyword) {
            $q->where('judul', 'like', '%' . $keyword . '%')
            ->orWhere('konten', 'like', '%' . $keyword . '%');
        })
        ->latest('id_artikel') 
        ->paginate(5)
        ->withQueryString(); 

    return view('user.blog', compact('contacts', 'topBlog', 'middleBlogs', 'remainingBlogs', 'keyword'));
}



    public function show($id)
    {
        $artikel = artikel::find($id);

        if (!$artikel) {
            return redirect()->route('blog')->with('error', 'Artikel tidak ditemukan.');
        }

        $contacts = kontak::all();

        return view('user.showBlog', compact('artikel', 'contacts'));
    }
}

