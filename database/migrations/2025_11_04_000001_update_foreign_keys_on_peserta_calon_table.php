<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perubahan ke database.
     */
    public function up(): void
    {
        Schema::table('peserta_calon', function (Blueprint $table) {
            // Hapus constraint lama (jika sudah ada)
            try {
                $table->dropForeign(['user_id']);
            } catch (\Throwable $e) {
                // ignore jika belum ada
            }

            try {
                $table->dropForeign(['ketua_id']);
            } catch (\Throwable $e) {
                // ignore jika belum ada
            }
        });

        Schema::table('peserta_calon', function (Blueprint $table) {
            // Samakan tipe kolom dengan BIGINT UNSIGNED
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->unsignedBigInteger('ketua_id')->nullable()->change();

            // Tambahkan relasi baru
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('ketua_id')
                ->references('id')
                ->on('peserta_calon')
                ->nullOnDelete();
        });
    }

    /**
     * Rollback perubahan.
     */
    public function down(): void
    {
        Schema::table('peserta_calon', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['user_id']);
            $table->dropForeign(['ketua_id']);
        });
    }
};
