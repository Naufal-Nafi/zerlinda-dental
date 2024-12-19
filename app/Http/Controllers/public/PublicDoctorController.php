<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Dokterr;
use App\Models\kontak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicDoctorController extends Controller
{
    public function index(Request $request)
    {        
        $contacts = kontak::all();

        Carbon::setLocale('id');
        $tanggal = $request->input('keyword');
        
        if(!$tanggal) {
            $tanggal = Carbon::today()->format('Y-m-d');
        }

        $hari = strtolower(Carbon::parse($tanggal)->translatedFormat('l'));

        $data = DB::table('dokterr')
            ->whereRaw("JSON_CONTAINS(jadwal, '{}', '$.\"$hari\"')")
            ->get();

        // dd($data);

        // Filter untuk mengembalikan hanya data hari tertentu
        $filteredData = $data->map(function ($item) use ($hari) {
            $jadwal = json_decode($item->jadwal, true);

            return [
                'nama' => $item->nama,
                'jadwal' => [
                    $hari => $jadwal[$hari] ?? null,
                ],
                'gambar' => $item->gambar,
            ];
        });

        // Kembalikan view dengan data dokter, keyword, dan kontak
        return view('user.doctor', compact('filteredData', 'contacts'));
    }
}
