<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Skip this migration if calon_pesertas table exists (newer schema)
        if (Schema::hasTable('calon_pesertas')) {
            return;
        }

        // Skip if peserta_calon doesn't exist
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        // 1. Ambil semua foreign key untuk tabel ini
        $foreignKeys = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.TABLE_CONSTRAINTS 
            WHERE TABLE_SCHEMA = DATABASE() 
            AND TABLE_NAME = 'peserta_calon' 
            AND CONSTRAINT_TYPE = 'FOREIGN KEY'
        ");

        // 2. Loop melalui hasil query menggunakan PHP di luar Schema::table
        foreach ($foreignKeys as $key) {
            // 3. Periksa apakah nama constraint cocok
            if (str_contains($key->CONSTRAINT_NAME, 'user_id') || 
                str_contains($key->CONSTRAINT_NAME, 'ketua_id')) {
                // 4. Hapus foreign key tersebut secara terpisah
                Schema::table('peserta_calon', function (Blueprint $table) use ($key) {
                    try {
                        $table->dropForeign($key->CONSTRAINT_NAME);
                    } catch (\Throwable $e) {
                        // Abaikan jika gagal (mungkin sudah dihapus)
                        // logging bisa ditambahkan di sini jika perlu
                    }
                });
            }
        }

        // 🔹 Pastikan tipe kolom sudah sesuai
        Schema::table('peserta_calon', function (Blueprint $table) {
            if (Schema::hasColumn('peserta_calon', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->change();
            }
            if (Schema::hasColumn('peserta_calon', 'ketua_id')) {
                $table->unsignedBigInteger('ketua_id')->nullable()->change();
            } else {
                // Jika kolom ketua_id belum ada, tambahkan
                $table->unsignedBigInteger('ketua_id')->nullable()->after('user_id');
            }
        }); 

        // 🔹 Tambahkan FK baru
        Schema::table('peserta_calon', function (Blueprint $table) {
            if (Schema::hasColumn('peserta_calon', 'user_id')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();
            }

            if (Schema::hasColumn('peserta_calon', 'ketua_id')) {
                $table->foreign('ketua_id')
                    ->references('id')
                    ->on('peserta_calon') // Relasi self-referencing
                    ->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        // Ambil semua foreign key
        $foreignKeys = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.TABLE_CONSTRAINTS 
            WHERE TABLE_SCHEMA = DATABASE() 
            AND TABLE_NAME = 'peserta_calon' 
            AND CONSTRAINT_TYPE = 'FOREIGN KEY'
        ");

        foreach ($foreignKeys as $key) {
            if (str_contains($key->CONSTRAINT_NAME, 'user_id') || 
                str_contains($key->CONSTRAINT_NAME, 'ketua_id')) {
                Schema::table('peserta_calon', function (Blueprint $table) use ($key) {
                    try {
                        $table->dropForeign($key->CONSTRAINT_NAME);
                    } catch (\Throwable $e) {
                        // Abaikan jika gagal
                    }
                });
            }
        }

        // (Opsional) Kembalikan kolom ke status sebelumnya jika diperlukan
        // Misalnya, hapus kolom ketua_id jika ditambahkan di up(), atau kembalikan nilai default/nullable
        // Contoh:
        // Schema::table('peserta_calon', function (Blueprint $table) {
        //     $table->dropColumn('ketua_id'); // Hanya jika ditambahkan di up()
        //     // Atau kembalikan ke unsignedBigInteger()->nullable(false) jika itu nilai sebelumnya
        // });
    }
};