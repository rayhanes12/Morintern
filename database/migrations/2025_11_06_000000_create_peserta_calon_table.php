<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_calon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('no_telp', 20)->nullable();
            $table->string('universitas_id', 100)->nullable();
            $table->string('jurusan_id', 100)->nullable();

            $table->unsignedBigInteger('spesialisasi_id')->nullable();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->unsignedBigInteger('perusahaan_id')->nullable();

            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();

            $table->string('github', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('cv', 200)->nullable()->comment('File CV format .zip');
            $table->string('surat', 200)->nullable()->comment('File surat format .jpg/.png');

            $table->enum('status', ['pending', 'applied', 'accepted', 'rejected'])->default('pending');
            $table->string('google_id', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();

            // 🔹 Foreign keys
            $table->foreign('spesialisasi_id')->references('id')->on('spesialisasi')->nullOnDelete();
            $table->foreign('kelompok_id')->references('id')->on('kelompok')->nullOnDelete();
            $table->foreign('ketua_id')->references('id')->on('peserta_calon')->nullOnDelete();
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_calon');
    }
};
