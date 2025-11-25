<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penilaian_magang', function (Blueprint $table) {
            if (! Schema::hasColumn('penilaian_magang', 'peserta_id')) {
                $table->foreignId('peserta_id')->nullable()->constrained('pesertas')->nullOnDelete()->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaian_magang', function (Blueprint $table) {
            if (Schema::hasColumn('penilaian_magang', 'peserta_id')) {
                $table->dropConstrainedForeignId('peserta_id');
            }
        });
    }
};
