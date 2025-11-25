<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeederSkeleton extends Seeder
{
    public function run(): void
    {
        // Non-destructive skeleton seeder for role lookup table
        // Adjust table name/columns to match your schema if needed
        DB::table('role')->insert([
            ['nama' => 'superadmin'],
            ['nama' => 'admin'],
            ['nama' => 'hrd'],
            ['nama' => 'mentor'],
            ['nama' => 'peserta'],
        ]);
    }
}
