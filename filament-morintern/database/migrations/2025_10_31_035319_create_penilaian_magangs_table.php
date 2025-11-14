<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian_magang', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // nama peserta yang dinilai
            $table->decimal('nilai_rata_rata', 5, 2)->nullable();
            $table->text('masukan')->nullable(); // masukan dari HRD
            $table->string('file_penilaian')->nullable(); // dokumen penilaian
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_magang');
    }
};
