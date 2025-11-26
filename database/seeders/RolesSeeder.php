<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('role')->insert([
            ['id' => 1, 'nama' => 'superadmin'],
            ['id' => 2, 'nama' => 'admin'],
            ['id' => 3, 'nama' => 'mentor'],
            ['id' => 4, 'nama' => 'hrd'],
            ['id' => 5, 'nama' => 'peserta'],
        ]);
    }
}
