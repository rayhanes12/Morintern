<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

// return new class extends Migration
// {
//     /**
//      * Jalankan perubahan ke database.
//      */
//     public function up(): void
//     {
//         // Skip this migration if calon_pesertas table exists (newer schema)
//         if (Schema::hasTable('calon_pesertas')) {
//             return;
//         }

//         // Skip if peserta_calon doesn't exist
//         if (!Schema::hasTable('peserta_calon')) {
//             return;
//         }

//         Schema::table('peserta_calon', function (Blueprint $table) {
//             // Get all foreign keys for this table
//             $foreignKeys = DB::select(
//                 "SELECT CONSTRAINT_NAME 
//                  FROM information_schema.TABLE_CONSTRAINTS 
//                  WHERE TABLE_SCHEMA = DATABASE() 
//                  AND TABLE_NAME = 'peserta_calon' 
//                  AND CONSTRAINT_TYPE = 'FOREIGN KEY'"
//             );

//             // Drop existing foreign keys if they exist
//             foreach ($foreignKeys as $key) {
//                 if (str_contains($key->CONSTRAINT_NAME, 'user_id') || 
//                     str_contains($key->CONSTRAINT_NAME, 'ketua_id')) {
//                     try {
//                         $table->dropForeign($key->CONSTRAINT_NAME);
//                     } catch (\Throwable $e) {
//                         // ignore if fails
//                     }
//                 }
//             }
//         });

//         Schema::table('peserta_calon', function (Blueprint $table) {
//             // Samakan tipe kolom dengan BIGINT UNSIGNED
//             if (Schema::hasColumn('peserta_calon', 'user_id')) {
//                 $table->unsignedBigInteger('user_id')->nullable()->change();
//             }
            
//             if (Schema::hasColumn('peserta_calon', 'ketua_id')) {
//                 $table->unsignedBigInteger('ketua_id')->nullable()->change();
//             }

//             // Tambahkan relasi baru
//             if (Schema::hasColumn('peserta_calon', 'user_id')) {
//                 $table->foreign('user_id')
//                     ->references('id')
//                     ->on('users')
//                     ->cascadeOnDelete();
//             }

//             if (Schema::hasColumn('peserta_calon', 'ketua_id')) {
//                 $table->foreign('ketua_id')
//                     ->references('id')
//                     ->on('peserta_calon')
//                     ->nullOnDelete();
//             }
//         });
//     }

//     /**
//      * Rollback perubahan.
//      */
//     public function down(): void
//     {
//         if (!Schema::hasTable('peserta_calon')) {
//             return;
//         }

//         Schema::table('peserta_calon', function (Blueprint $table) {
//             // Get all foreign keys
//             $foreignKeys = DB::select(
//                 "SELECT CONSTRAINT_NAME 
//                  FROM information_schema.TABLE_CONSTRAINTS 
//                  WHERE TABLE_SCHEMA = DATABASE() 
//                  AND TABLE_NAME = 'peserta_calon' 
//                  AND CONSTRAINT_TYPE = 'FOREIGN KEY'"
//             );

//             foreach ($foreignKeys as $key) {
//                 if (str_contains($key->CONSTRAINT_NAME, 'user_id') || 
//                     str_contains($key->CONSTRAINT_NAME, 'ketua_id')) {
//                     try {
//                         $table->dropForeign($key->CONSTRAINT_NAME);
//                     } catch (\Throwable $e) {
//                         // ignore
//                     }
//                 }
//             }
//         });
//     }
// };



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
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

        Schema::table('peserta_calon', function (Blueprint $table) {
            // Get all foreign keys for this table
            $foreignKeys = DB::select(
                "SELECT CONSTRAINT_NAME 
                 FROM information_schema.TABLE_CONSTRAINTS 
                 WHERE TABLE_SCHEMA = DATABASE() 
                 AND TABLE_NAME = 'peserta_calon' 
                 AND CONSTRAINT_TYPE = 'FOREIGN KEY'"

            // Drop existing foreign keys if they exist
            foreach ($foreignKeys as $key) {
                if (str_contains($key->CONSTRAINT_NAME, 'user_id') || 
                    str_contains($key->CONSTRAINT_NAME, 'ketua_id')) {
                    try {
                        $table->dropForeign($key->CONSTRAINT_NAME);
                    } catch (\Throwable $e) {
                        // ignore if fails
                    }
                }

            }
        });
            }

        // 🔹 Pastikan tipe kolom sudah sesuai
        Schema::table('peserta_calon', function (Blueprint $table) {
            if (Schema::hasColumn('peserta_calon', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->change();
            }
            if (Schema::hasColumn('peserta_calon', 'ketua_id')) {
                $table->unsignedBigInteger('ketua_id')->nullable()->change();
            } else {
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
                    ->on('peserta_calon')
                    ->nullOnDelete();
            }
        });
            if (Schema::hasColumn('peserta_calon', 'ketua_id')) {
                $table->foreign('ketua_id')
                    ->references('id')
                    ->on('peserta_calon')
                    ->nullOnDelete();
            }

    public function down(): void
    {
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        Schema::table('peserta_calon', function (Blueprint $table) {
            // Get all foreign keys
            $foreignKeys = DB::select(
                "SELECT CONSTRAINT_NAME 
                 FROM information_schema.TABLE_CONSTRAINTS 
                 WHERE TABLE_SCHEMA = DATABASE() 
                 AND TABLE_NAME = 'peserta_calon' 
                 AND CONSTRAINT_TYPE = 'FOREIGN KEY'"
            );

            foreach ($foreignKeys as $key) {
                if (str_contains($key->CONSTRAINT_NAME, 'user_id') || 
                    str_contains($key->CONSTRAINT_NAME, 'ketua_id')) {
                    try {
                        $table->dropForeign($key->CONSTRAINT_NAME);
                    } catch (\Throwable $e) {
                        // ignore
                    }
                }
            }
        });
    }
}