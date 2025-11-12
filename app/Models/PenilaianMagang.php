<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianMagang extends Model
{
    use HasFactory;

    protected $table = 'penilaian_magang';

    protected $fillable = [
        'nama',
        'nilai_rata_rata',
        'masukan',
        'file_penilaian',
    ];
}
