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
                'nama_akun' => '-',
                'url' => '-',
            ],
            [
                'jenis_kontak' => 'Instagram',
                'nama_akun' => '-',
                'url' => '-',
            ],
            [
                'jenis_kontak' => 'Facebook',
                'nama_akun' => '-',
                'url' => '-',
            ],
            [
                'jenis_kontak' => 'Tiktok',
                'nama_akun' => '-',
                'url' => '-',
            ],
            [
                'jenis_kontak' => 'WhatsApp',
                'nama_akun' => '-',
                'url' => '-',
            ],
        ]);

        DB::table('pengguna')->insert([
            'email' => 'ninoauliyanahara@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'admin',
            'token' => 'admin',
        ]);        
    }
}
