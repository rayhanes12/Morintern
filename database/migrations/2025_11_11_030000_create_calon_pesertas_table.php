<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calon_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('asal_universitas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('no_hp');
            $table->string('email');
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('cv')->nullable();
            $table->string('surat_lamaran')->nullable();
            $table->string('spesialisasi')->nullable();
            $table->enum('status', ['pendaftar', 'diterima', 'ditolak'])->default('pendaftar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_pesertas');
    }
};
