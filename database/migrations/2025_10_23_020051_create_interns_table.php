<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->string('no_telp')->nullable(); 
            $table->integer('ketua_id')->nullable();    
            $table->integer('konten_id')->nullable();
            $table->integer('perusahaan_id')->nullable();
            $table->datetime('tanggal_daftar')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('kelompok_id')->nullable();
            $table->string('universitas')->nullable();
            $table->string('jurusan')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('cv')->nullable();
            $table->string('surat')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
