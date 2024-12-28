<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
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
        
        $data = DB::table('dokter')
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

        // Mengambil jadwal dokter dari semua dokter
        $dokters = Dokter::all();
        $jadwalPraktek = [];
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

        foreach ($dokters as $dokter) {
            foreach ($days as $day) {
                // Periksa apakah dokter memiliki jadwal untuk hari ini
                if (isset($dokter->jadwal[$day])) {
                    $schedule = $dokter->jadwal[$day];
                    if (!empty($schedule['jadwal_awal']) && !empty($schedule['jadwal_akhir'])) {
                        // Simpan jadwal dalam array berdasarkan hari
                        $startTime = strtotime($schedule['jadwal_awal']);
                        $endTime = strtotime($schedule['jadwal_akhir']);
                        $jadwalPraktek[$day][] = ['start' => $startTime, 'end' => $endTime];
                    }
                }
            }
        }


        // Gabungkan jadwal dan urutkan
        foreach ($jadwalPraktek as $day => $schedule) {
            usort($schedule, function($a, $b) {
                return $a['start'] - $b['start'];
            });

            // Gabungkan jadwal yang tumpang tindih
            $jadwalMerged = [];
            foreach ($schedule as $sched) {
                if (empty($jadwalMerged)) {
                    $jadwalMerged[] = $sched;
                } else {
                    $last = &$jadwalMerged[count($jadwalMerged) - 1];
                    if ($sched['start'] <= $last['end']) {
                        $last['end'] = max($last['end'], $sched['end']);
                    } else {
                        $jadwalMerged[] = $sched;
                    }
                }
            }

            $jadwalPraktek[$day] = $jadwalMerged;
        }

        return view('user.doctor', compact('filteredData', 'contacts', 'hari', 'jadwalPraktek'));
    }
}
