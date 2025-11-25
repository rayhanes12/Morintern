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

        // Use raw statement to avoid requiring doctrine/dbal
        DB::statement("ALTER TABLE `peserta_calon` MODIFY `password` VARCHAR(255) NULL;");
    }

    public function down(): void
    {
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        // Revert to NOT NULL with empty string default to avoid errors
        DB::statement("ALTER TABLE `peserta_calon` MODIFY `password` VARCHAR(255) NOT NULL DEFAULT '';");
    }
};
