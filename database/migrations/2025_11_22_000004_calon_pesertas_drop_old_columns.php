<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Drop old columns (`nama`, `no_hp`, `spesialisasi`) only if safe.
     * Safety rule: abort unless there are zero rows with `nama_lengkap` IS NULL.
     */
    public function up(): void
    {
        if (!Schema::hasTable('calon_pesertas')) {
            return;
        }

        $nullNamaCount = DB::table('calon_pesertas')->whereNull('nama_lengkap')->count();
        if ($nullNamaCount > 0) {
            throw new \RuntimeException("Refusing to drop old columns: found {$nullNamaCount} rows where 'nama_lengkap' IS NULL. Please run backfill and resolve entries in 'spesialisasi_backfill_log' before dropping old columns.");
        }

        Schema::table('calon_pesertas', function (Blueprint $table) {
            if (Schema::hasColumn('calon_pesertas', 'spesialisasi')) {
                $table->dropColumn('spesialisasi');
            }
            if (Schema::hasColumn('calon_pesertas', 'no_hp')) {
                $table->dropColumn('no_hp');
            }
            if (Schema::hasColumn('calon_pesertas', 'nama')) {
                $table->dropColumn('nama');
            }
        });
    }

    public function down(): void
    {
        // Restoring dropped columns is potentially destructive and context dependent.
        // This down() intentionally does not recreate the original string columns.
    }
};
