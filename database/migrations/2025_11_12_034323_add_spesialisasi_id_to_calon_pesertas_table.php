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
        Schema::table('calon_pesertas', function (Blueprint $table) {
            // Add spesialisasi_id as foreign key
            $table->foreignId('spesialisasi_id')
                ->nullable()
                ->after('surat_lamaran')
                ->constrained('spesialisasi')
                ->nullOnDelete();
            
            // Keep the old spesialisasi column for now (can be removed later if not needed)
            // The old column is a string that stores the name directly
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calon_pesertas', function (Blueprint $table) {
            $table->dropForeign(['spesialisasi_id']);
            $table->dropColumn('spesialisasi_id');
        });
    }
};
