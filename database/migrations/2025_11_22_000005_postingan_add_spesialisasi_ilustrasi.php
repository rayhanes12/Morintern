<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('postingan_magangs')) {
            return;
        }

        Schema::table('postingan_magangs', function (Blueprint $table) {
            if (!Schema::hasColumn('postingan_magangs', 'spesialisasi_id')) {
                $table->unsignedBigInteger('spesialisasi_id')->nullable()->after('deskripsi');
                $table->index('spesialisasi_id', 'postingan_spesialisasi_idx');
            }

            if (!Schema::hasColumn('postingan_magangs', 'ilustrasi')) {
                $table->string('ilustrasi')->nullable()->after('kuota');
            }
        });

        // Add FK if spesialisasi table exists
        if (Schema::hasTable('spesialisasi') && Schema::hasColumn('postingan_magangs', 'spesialisasi_id')) {
            Schema::table('postingan_magangs', function (Blueprint $table) {
                $table->foreign('spesialisasi_id')->references('id')->on('spesialisasi')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('postingan_magangs')) {
            return;
        }

        Schema::table('postingan_magangs', function (Blueprint $table) {
            if (Schema::hasColumn('postingan_magangs', 'spesialisasi_id')) {
                // Drop FK if exists
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                // Attempt to drop index/foreign gracefully
                try {
                    $table->dropForeign(['spesialisasi_id']);
                } catch (\Throwable $_) {
                    // ignore
                }
                try {
                    $table->dropIndex('postingan_spesialisasi_idx');
                } catch (\Throwable $_) {
                }
                $table->dropColumn('spesialisasi_id');
            }

            if (Schema::hasColumn('postingan_magangs', 'ilustrasi')) {
                $table->dropColumn('ilustrasi');
            }
        });
    }
};
