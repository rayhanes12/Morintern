<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spesialisasi extends Model
{
    use HasFactory;

    // Pastikan Laravel tidak mengubah menjadi 'spesialisasis'
    protected $table = 'spesialisasi';

    protected $fillable = [
        'nama_spesialisasi',
        'deskripsi',
    ];

    // ✅ Relasi ke tabel calon_pesertas
    public function calonPesertas(): HasMany
    {
        return $this->hasMany(PesertaCalon::class, 'spesialisasi_id');
    }

    public function pesertas(): HasMany
    {
        return $this->hasMany(Peserta::class, 'spesialisasi_id');
    }
}
