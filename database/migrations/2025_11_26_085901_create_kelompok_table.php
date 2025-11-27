<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelompok', function (Blueprint $table) {
            $table->id(); // Primary key aman untuk FK reference
            $table->string('nama_kelompok')->nullable(); // Contoh field, adjust sesuai project-mu
            $table->foreignId('ketua_id')->nullable()->constrained('peserta_calon')->onDelete('set null'); // Opsional FK balik, aman
            $table->timestamps(); // Track created/updated, maintain audit
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelompok'); // Rollback aman, no data loss kalau table empty
    }
};