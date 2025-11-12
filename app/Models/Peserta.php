<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PesertaResetPasswordNotification;

class Peserta extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pesertas';

        protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'google_id',
        'no_telp',
        'ketua_id',
        'konten_id',
        'perusahaan_id',
        'tanggal_daftar',
        'status_id',
        'spesialisasi_id', 
        'kelompok_id',
        'universitas',
        'jurusan',
        'spesialis',
        'github',
        'linkedin',
        'tanggal_mulai',
        'tanggal_selesai',
        'cv',
        'surat',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Pastikan password otomatis di-hash saat diset
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
        }
    }

    /**
     * Send the password reset notification for the given token.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PesertaResetPasswordNotification($token));
    }

    /**
     * Optional: provide a name attribute for compatibility with views expecting $user->name
     */
    public function getNameAttribute()
    {
        return $this->nama_lengkap;
    }

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}