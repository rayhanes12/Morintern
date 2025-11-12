<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PesertaCalonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peserta_calon')->insert([
            [
                'nama_lengkap' => 'Tes Calon Peserta',
                'email' => 'tescalon@example.com',
                'password' => Hash::make('password123'),
                'no_telp' => '08123456789',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
