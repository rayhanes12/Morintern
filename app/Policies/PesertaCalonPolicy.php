<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PesertaCalon;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class PesertaCalonPolicy
{
    use HandlesAuthorization;

    public function approve(AuthUser $authUser, PesertaCalon $calon): bool
    {
        // TODO: replace with real role check when roles are implemented
        return $authUser !== null; // any authenticated web user for now
    }

    public function reject(AuthUser $authUser, PesertaCalon $calon): bool
    {
        // TODO: replace with real role check when roles are implemented
        return $authUser !== null; // any authenticated web user for now
    }
}