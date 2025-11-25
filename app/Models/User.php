<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * Attributes that can be mass-assigned.
     */
    protected $fillable = [
        'role_id',
        'requested_role_id',
        'perusahaan_id',
        'name',
        'email',
        'password',
        'google_id',
        'foto',
        'jabatan',
        'no_telp',
        'perusahaan',
        'alamat',
    ];

    /**
     * Hidden attributes for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast attributes.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Laravel 12
        ];
    }

    /**
     * ============================
     *   RELASI
     * ============================
     */

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function requestedRole()
    {
        return $this->belongsTo(Role::class, 'requested_role_id');
    }


    /**
     * ============================
     *   ROLE PERMISSION (Filament)
     * ============================
     */

    /**
     * Superadmin = ID 1
     */
    public function isSuperAdmin(): bool
    {
        return $this->role_id === 1;
    }

    /**
     * Admin Panel Access:
     * - 1 = Superadmin
     * - 2 = Admin / HRD / Mentor (kamu ingin akses sama)
     */
    public function isAdminPanelAllowed(): bool
    {
        return in_array($this->role_id, [1, 2]);
    }
}
