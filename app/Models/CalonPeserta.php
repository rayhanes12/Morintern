<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPeserta extends Model
{
    use HasFactory;

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
    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class, 'spesialisasi_id');
    }
}
