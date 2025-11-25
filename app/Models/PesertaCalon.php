<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Notifications\PesertaResetPasswordNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaCalon extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'peserta_calon';

    protected $with = ['spesialisasi'];

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'no_telp',
        'universitas_id',
        'jurusan_id',
        'spesialisasi_id',
        'kelompok_id',
        'ketua_id',
        'perusahaan_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'github',
        'linkedin',
        'cv',
        'surat',
        'status',
        'google_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    // 🔹 Auto hash password saat diset
    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            return;
        }

        // If the value looks like an already-hashed password (bcrypt/argon prefixes),
        // store it as-is. Otherwise, hash it once.
        if (str_starts_with($value, '$2y$') || str_starts_with($value, '$2a$') || str_starts_with($value, '$argon')) {
            $this->attributes['password'] = $value;
            return;
        }

        $this->attributes['password'] = Hash::make($value);
    }

    public function spesialisasi(): BelongsTo
    {
        return $this->belongsTo(Spesialisasi::class, 'spesialisasi_id');
    }

    public function ketua(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'ketua_id');
    }



    // 🔹 Untuk notifikasi reset password
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PesertaResetPasswordNotification($token));
    }

    // 🔹 Fallback getter (biar konsisten dengan model lain)
    public function getNameAttribute()
    {
        return $this->nama_lengkap;
    }

    public function getCvUrlAttribute(): ?string
    {
        if (! $this->cv) {
            return null;
        }
        return URL::temporarySignedRoute('files.calon.cv.download', now()->addMinutes(15), ['calon' => $this->id]);
    }

    public function getSuratUrlAttribute(): ?string
    {
        if (! $this->surat) {
            return null;
        }
        return URL::temporarySignedRoute('files.calon.surat.download', now()->addMinutes(15), ['calon' => $this->id]);
    }
}
