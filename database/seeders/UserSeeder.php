<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengguna')->insert([
            'email' => 'F5E5O@example.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'token' => 'admin',
        ]);
    }
}
