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

        // Seeder untuk tabel artikel
        for ($i = 1; $i <= 15; $i++) {
            DB::table('artikel')->insert([
                'judul' => fake()->sentence(6, true),
                'konten' => fake()->paragraphs(4, true),
                'url_media' => 'galeri_artikel/HC5kH4t5wZA01YU7atYqrGnwg4YytbL5bGa3uLQd.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk tabel layanan
        $jenisLayanan = ['anak', 'dewasa', 'umum'];
        foreach ($jenisLayanan as $jenis) {
            for ($i = 1; $i <= 10; $i++) {
                DB::table('layanan')->insert([
                    'nama_layanan' => 'Layanan ' . ucfirst($jenis) . ' ' . $i,
                    'deskripsi' => fake()->paragraphs(4, true),
                    'jenis_layanan' => $jenis,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Seeder untuk tabel galeri_layanan
        for ($i = 1; $i <= 30; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                DB::table('galeri_layanan')->insert([
                    'url_media' => 'galeri_layanan/1734968530_artikel_4.png',
                    'id_layanan' => $i, // Pastikan $i ada di tabel layanan
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        DB::table('dokter')->insert([
            [
                'nama' => fake()->name(),
                'gambar' => 'gambar_dokter/FWQZQ3TFA1XAuLhu1JOuCqIK7PnB4h0oYotLGdYe.png',
                'jadwal' => json_encode([
                    'senin' => [
                        'hari' => 'senin',
                        'jadwal_awal' => '07:00',
                        'jadwal_akhir' => '12:00',
                    ],
                    'selasa' => [
                        'hari' => 'selasa',
                        'jadwal_awal' => '09:00',
                        'jadwal_akhir' => '14:00',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => fake()->name(),
                'gambar' => 'gambar_dokter/FWQZQ3TFA1XAuLhu1JOuCqIK7PnB4h0oYotLGdYe.png',
                'jadwal' => json_encode([
                    'senin' => [
                        'hari' => 'senin',
                        'jadwal_awal' => '08:00',
                        'jadwal_akhir' => '13:00',
                    ],
                    'rabu' => [
                        'hari' => 'rabu',
                        'jadwal_awal' => '10:00',
                        'jadwal_akhir' => '15:00',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => fake()->name(),
                'gambar' => 'gambar_dokter/FWQZQ3TFA1XAuLhu1JOuCqIK7PnB4h0oYotLGdYe.png',
                'jadwal' => json_encode([
                    'senin' => [
                        'hari' => 'senin',
                        'jadwal_awal' => '06:30',
                        'jadwal_akhir' => '11:30',
                    ],
                    'kamis' => [
                        'hari' => 'kamis',
                        'jadwal_awal' => '14:00',
                        'jadwal_akhir' => '18:00',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => fake()->name(),
                'gambar' => 'gambar_dokter/FWQZQ3TFA1XAuLhu1JOuCqIK7PnB4h0oYotLGdYe.png',
                'jadwal' => json_encode([
                    'selasa' => [
                        'hari' => 'selasa',
                        'jadwal_awal' => '10:30',
                        'jadwal_akhir' => '15:30',
                    ],
                    'jumat' => [
                        'hari' => 'jumat',
                        'jadwal_awal' => '08:00',
                        'jadwal_akhir' => '13:00',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => fake()->name(),
                'gambar' => 'gambar_dokter/FWQZQ3TFA1XAuLhu1JOuCqIK7PnB4h0oYotLGdYe.png',
                'jadwal' => json_encode([
                    'senin' => [
                        'hari' => 'senin',
                        'jadwal_awal' => '05:45',
                        'jadwal_akhir' => '10:30',
                    ],
                    'kamis' => [
                        'hari' => 'kamis',
                        'jadwal_awal' => '12:00',
                        'jadwal_akhir' => '17:00',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);    
    }
}
