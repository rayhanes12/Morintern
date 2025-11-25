<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Notifications\PesertaResetPasswordNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function spesialisasi(): BelongsTo
    {
        return $this->belongsTo(Spesialisasi::class, 'spesialisasi_id');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(PesertaCalon::class, 'ketua_id');
    }

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

    public function getCvUrlAttribute(): ?string
    {
        if (! $this->cv) {
            return null;
        }
        return URL::temporarySignedRoute('files.peserta.cv.download', now()->addMinutes(15), ['peserta' => $this->id]);
    }

    public function getSuratUrlAttribute(): ?string
    {
        if (! $this->surat) {
            return null;
        }
        return URL::temporarySignedRoute('files.peserta.surat.download', now()->addMinutes(15), ['peserta' => $this->id]);
    }

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'tanggal_daftar' => 'date',
    ];
}
