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
    Schema::create('anggotas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('ketua_id'); // menghubungkan ke user ketua
        $table->string('nama_lengkap');
        $table->string('email')->unique();
        $table->string('no_telp')->nullable();
        $table->string('github')->nullable();
        $table->string('linkedin')->nullable();
        $table->unsignedBigInteger('spesialisasi_id')->nullable();
        $table->timestamps();

        $table->foreign('ketua_id')->references('id')->on('users')->onDelete('cascade');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};      
