<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\Dokter;
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
            ->get();
        
        $layanan2_dewasa = layanan::with('galeri_layanan')
            ->where('jenis_layanan', 'dewasa')            
            ->get();
        
        $layanan2_umum = layanan::with('galeri_layanan')
            ->where('jenis_layanan', 'umum')            
            ->get();

        $contacts = kontak::all();   
        
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
        
        return view('user.home', compact('images', 'artikels','layanan2_anak','layanan2_dewasa', 'layanan2_umum', 'contacts','jadwalPraktek'));
    }     
}