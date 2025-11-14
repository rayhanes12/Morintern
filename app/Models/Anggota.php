<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'ketua_id',
        'nama_lengkap',
        'email',
        'no_telp',
        'github',
        'linkedin',
        'spesialisasi_id',
    ];

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }
}
