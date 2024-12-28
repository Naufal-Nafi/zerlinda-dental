<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\kontak;
use App\Models\Dokter;
use App\Models\layanan;
use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function adultService()
    {
        $contacts = kontak::all();
        $services = layanan::where('jenis_layanan', 'dewasa')->paginate(6);
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

        return view('user.service_adult', compact('services', 'contacts','jadwalPraktek'));
    }

    public function childService()
    {
        $contacts = kontak::all();
        $services = layanan::where('jenis_layanan', 'anak')->paginate(6);
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


        return view('user.service_child', compact('services', 'contacts', 'jadwalPraktek'));
    }

    public function umumService()
    {
        $contacts = kontak::all();
        $services = layanan::where('jenis_layanan', 'umum')->paginate(6);
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


        return view('user.service_umum', compact('services', 'contacts', 'jadwalPraktek'));
    }

    public function show($id)
    {
        $contacts = kontak::all();  

        // Ambil layanan berdasarkan ID
        $service = layanan::with('galeri_layanan')->findOrFail($id);        

        // Ambil semua gambar dari galeri kecuali yang pertama
        $images = $service->galeri_layanan->skip(1)->pluck('url_media');

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


        return view('user.showService', compact('service', 'images', 'contacts', 'jadwalPraktek'));
    }
}

