<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokter')->insert([
            'nama' => 'Dokter 1',
            'jadwal' => 'Senin',
            'jadwal_awal' => '15:00',
            'jadwal_akhir' => '17:00',
        ]);
    }
}
