<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianMagang extends Model
{
    use HasFactory;

    protected $table = 'penilaian_magang';

    protected $fillable = [
        'peserta_id',
        'nama',
        'nilai_rata_rata',
        'masukan',
        'file_penilaian',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
}
