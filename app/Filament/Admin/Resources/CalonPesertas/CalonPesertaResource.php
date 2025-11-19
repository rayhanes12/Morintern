<?php

namespace App\Filament\Admin\Resources\CalonPesertas;

use App\Filament\Admin\Resources\CalonPesertas\Pages\CreateCalonPeserta;
use App\Filament\Admin\Resources\CalonPesertas\Pages\EditCalonPeserta;
use App\Filament\Admin\Resources\CalonPesertas\Pages\ListCalonPesertas;
use App\Filament\Admin\Resources\CalonPesertas\Schemas\CalonPesertaForm;
use App\Filament\Admin\Resources\CalonPesertas\Tables\CalonPesertasTable;
use App\Models\CalonPeserta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CalonPesertaResource extends Resource
{
    public static function getModel(): string
    {
        return CalonPeserta::class;
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return Heroicon::OutlinedUsers;
    }

    public static function getNavigationLabel(): string
    {
        return 'Calon Peserta';
    }

    public static function getModelLabel(): string
    {
        return 'Calon Peserta';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Calon Peserta';
    }

    public static function getRecordTitleAttribute(): ?string
    {
        return 'nama_lengkap';
    }

    public static function form(Schema $schema): Schema
    {
        return CalonPesertaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CalonPesertasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCalonPesertas::route('/'),
            'create' => CreateCalonPeserta::route('/create'),
            'edit' => EditCalonPeserta::route('/{record}/edit'),
        ];
    }
}
