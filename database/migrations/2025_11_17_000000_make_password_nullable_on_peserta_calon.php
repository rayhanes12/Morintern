<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        // SQLite doesn't support MODIFY, so use driver-specific syntax
        $driver = DB::getDriverName();
        
        if ($driver === 'mysql') {
            DB::statement("ALTER TABLE `peserta_calon` MODIFY `password` VARCHAR(255) NULL;");
        } elseif ($driver === 'pgsql') {
            DB::statement("ALTER TABLE peserta_calon ALTER COLUMN password DROP NOT NULL;");
        }
        // SQLite: no action needed, password is already nullable in create migration
    }

    public function down(): void
    {
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        $driver = DB::getDriverName();
        
        if ($driver === 'mysql') {
            DB::statement("ALTER TABLE `peserta_calon` MODIFY `password` VARCHAR(255) NOT NULL DEFAULT '';");
        } elseif ($driver === 'pgsql') {
            DB::statement("ALTER TABLE peserta_calon ALTER COLUMN password SET NOT NULL;");
        }
        // SQLite: no action needed
    }
};
