<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostinganMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_posisi',
        'deskripsi',
        'durasi',
        'kuota',
    ];
}
