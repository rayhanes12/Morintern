<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CalonPesertaResource\Pages\ListCalonPesertas;
use App\Filament\Admin\Resources\CalonPesertaResource\Pages\CreateCalonPeserta;
use App\Filament\Admin\Resources\CalonPesertaResource\Pages\EditCalonPeserta;
use App\Filament\Admin\Resources\CalonPesertaResource\Pages;
use App\Models\CalonPeserta;
use Filament\Resources\Resource;

class CalonPesertaResource extends Resource
{
    protected static ?string $model = CalonPeserta::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Kelola Calon Peserta';

    public static function getPages(): array
    {
        return [
            'index' => ListCalonPesertas::route('/'),
            'create' => CreateCalonPeserta::route('/create'),
            'edit' => EditCalonPeserta::route('/{record}/edit'),
        ];
    }
}
