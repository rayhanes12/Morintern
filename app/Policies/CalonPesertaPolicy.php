<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CalonPeserta;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalonPesertaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CalonPeserta');
    }

    public function view(AuthUser $authUser, CalonPeserta $calonPeserta): bool
    {
        return $authUser->can('View:CalonPeserta');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CalonPeserta');
    }

    public function update(AuthUser $authUser, CalonPeserta $calonPeserta): bool
    {
        return $authUser->can('Update:CalonPeserta');
    }

    public function delete(AuthUser $authUser, CalonPeserta $calonPeserta): bool
    {
        return $authUser->can('Delete:CalonPeserta');
    }

    public function restore(AuthUser $authUser, CalonPeserta $calonPeserta): bool
    {
        return $authUser->can('Restore:CalonPeserta');
    }

    public function forceDelete(AuthUser $authUser, CalonPeserta $calonPeserta): bool
    {
        return $authUser->can('ForceDelete:CalonPeserta');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CalonPeserta');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CalonPeserta');
    }

    public function replicate(AuthUser $authUser, CalonPeserta $calonPeserta): bool
    {
        return $authUser->can('Replicate:CalonPeserta');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CalonPeserta');
    }

}