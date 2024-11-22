<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('kontak')->insert([
            [
                'jenis_kontak' => 'Gmail',
                'nama_akun' => 'F5E5O@example.com',
                'url' => 'F5E5O@example.com',
            ],
            [
                // isi array baru disini
                'jenis_kontak' => 'Instagram',
                'nama_akun' => 'admin',
                'url' => 'admin',
            ],
            [
                'jenis_kontak' => 'Facebook',
                'nama_akun' => 'admin',
                'url' => 'admin',
            ],
            [
                'jenis_kontak' => 'Tiktok',
                'nama_akun' => 'admin',
                'url' => 'admin',
            ],
            [
                'jenis_kontak' => 'WhatsApp',
                'nama_akun' => 'admin',
                'url' => 'admin',
            ],
        ]);

        
    }
}
