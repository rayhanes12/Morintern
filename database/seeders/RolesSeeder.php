<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only insert canonical roles when the table is empty
        if (!\Schema::hasTable('roles')) {
            $this->command->warn("Table 'roles' does not exist. Skipping RolesSeeder.");
            return;

        }

        $this->command->info('Inserted canonical roles.');
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
