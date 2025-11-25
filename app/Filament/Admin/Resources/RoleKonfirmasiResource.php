<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RoleKonfirmasiResource\Pages\ListRoleKonfirmasis;
use App\Filament\Admin\Resources\RoleKonfirmasiResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;

class RoleKonfirmasiResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-check';
    protected static ?string $navigationLabel = 'Konfirmasi Role';

    // Table schema moved to
    // App\Filament\Admin\Resources\RoleKonfirmasiResource\Schemas\TableSchema

    public static function getPages(): array
    {
        return [
            'index' => ListRoleKonfirmasis::route('/'),
        ];
    }
}
