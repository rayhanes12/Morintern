<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalonPesertaResource\Pages;
use App\Models\CalonPeserta;
use Filament\Resources\Resource;

class CalonPesertaResource extends Resource
{
    protected static ?string $model = CalonPeserta::class;

    protected static ?string $navigationGroup = 'Manajemen Magang';
    protected static ?string $navigationLabel = 'Calon Peserta';
    protected static ?string $slug = 'calon-pesertas';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCalonPeserta::route('/'),
            'view'  => Pages\ViewCalonPeserta::route('/{record}'),
        ];
    }
}
