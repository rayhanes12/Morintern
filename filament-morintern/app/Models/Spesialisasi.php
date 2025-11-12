<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_spesialisasi',
        'deskripsi',
    ];

    // ✅ Relasi ke tabel calon_pesertas
    public function calonPesertas()
    {
        return $this->hasMany(CalonPeserta::class);
    }
}
