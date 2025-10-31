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
        Schema::create('konten', function (Blueprint $table) {
            $table->id();
            $table->integer('hrd_id')->nullable();
            $table->integer('perusahaan_id')->nullable();
            $table->text('deskripsi');
            $table->string('durasi');
            $table->integer('kuota');
            $table->integer('status_id')->nullable();
            $table->integer('lokasi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten');
    }
};
