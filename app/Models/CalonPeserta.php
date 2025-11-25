<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalonPeserta extends Model
{
    use HasFactory;

    protected $with = ['spesialisasi'];

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'asal_universitas',
        'jurusan',
        'no_telepon',
        'email',
        'github',
        'linkedin',
        'tanggal_mulai',
        'tanggal_selesai',
        'cv',
        'surat_lamaran',
        'spesialisasi_id',
        'status', // pendaftar, diterima, ditolak
    ];

    // Relasi ke tabel spesialisasi
    public function spesialisasi(): BelongsTo
    {
        return $this->belongsTo(Spesialisasi::class, 'spesialisasi_id');
    }
}
