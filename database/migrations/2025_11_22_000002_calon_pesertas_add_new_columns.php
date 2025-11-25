<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add new columns (`nama_lengkap`, `no_telepon`, `spesialisasi_id`) defensively.
     */
    public function up(): void
    {
        if (!Schema::hasTable('calon_pesertas')) {
            // Table missing — skip migration to avoid fatal error.
            return;
        }

        Schema::table('calon_pesertas', function (Blueprint $table) {
            if (!Schema::hasColumn('calon_pesertas', 'nama_lengkap')) {
                $table->string('nama_lengkap')->nullable()->after('nama');
            }

            if (!Schema::hasColumn('calon_pesertas', 'no_telepon')) {
                // keep after existing `no_hp` if present; otherwise appended
                $table->string('no_telepon')->nullable()->after('no_hp');
            }

            if (!Schema::hasColumn('calon_pesertas', 'spesialisasi_id')) {
                $table->unsignedBigInteger('spesialisasi_id')->nullable()->after('surat_lamaran');
                $table->index('spesialisasi_id', 'calon_pesertas_spesialisasi_idx');
            }
        });
    }

    /**
     * Reverse changes: drop columns if they exist (note: destructive on rollback).
     */
    public function down(): void
    {
        if (!Schema::hasTable('calon_pesertas')) {
            return;
        }

        Schema::table('calon_pesertas', function (Blueprint $table) {
            if (Schema::hasColumn('calon_pesertas', 'spesialisasi_id')) {
                $table->dropIndex('calon_pesertas_spesialisasi_idx');
                $table->dropColumn('spesialisasi_id');
            }
            if (Schema::hasColumn('calon_pesertas', 'no_telepon')) {
                $table->dropColumn('no_telepon');
            }
            if (Schema::hasColumn('calon_pesertas', 'nama_lengkap')) {
                $table->dropColumn('nama_lengkap');
            }
        });
    }
};
