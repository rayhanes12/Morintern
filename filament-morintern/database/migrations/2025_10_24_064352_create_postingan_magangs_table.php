<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('postingan_magangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_posisi');
            $table->text('deskripsi');
            $table->string('durasi');
            $table->integer('kuota')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postingan_magangs');
    }
};
