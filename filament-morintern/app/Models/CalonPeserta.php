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
        'spesialisasi',
        'status', // pendaftar, diterima, ditolak
    ];
}
