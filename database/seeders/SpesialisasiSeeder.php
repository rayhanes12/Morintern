<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisasiSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('spesialisasi')->truncate();

        DB::table('spesialisasi')->insert([
            ['nama_spesialisasi' => 'Back End'],
            ['nama_spesialisasi' => 'Front End'],
            ['nama_spesialisasi' => 'System Analyst'],
            ['nama_spesialisasi' => 'Quality Assurance'],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
