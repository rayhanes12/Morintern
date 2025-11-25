<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PenilaianMagangResource\Pages\ListPenilaianMagangs;
use App\Filament\Admin\Resources\PenilaianMagangResource\Pages\CreatePenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangResource\Pages\EditPenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangResource\Pages;
use App\Models\PenilaianMagang;
use Filament\Resources\Resource;

class PenilaianMagangResource extends Resource
{
    protected static ?string $model = PenilaianMagang::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-check';
    protected static ?string $navigationLabel = 'Penilaian Magang';

    // Page-centric: Form and table schema moved to
    // App\Filament\Admin\Resources\PenilaianMagangResource\Schemas\FormSchema
    // and
    // App\Filament\Admin\Resources\PenilaianMagangResource\Schemas\TableSchema

    public static function getPages(): array
    {
        return [
            'index' => ListPenilaianMagangs::route('/'),
            'create' => CreatePenilaianMagang::route('/create'),
            'edit' => EditPenilaianMagang::route('/{record}/edit'),
        ];
    }
}
