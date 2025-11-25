<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs;

use App\Filament\Admin\Resources\PenilaianMagangs\Pages\CreatePenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangs\Pages\EditPenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangs\Pages\ListPenilaianMagangs;
use App\Filament\Admin\Resources\PenilaianMagangs\Schemas\PenilaianMagangForm;
use App\Filament\Admin\Resources\PenilaianMagangs\Tables\PenilaianMagangsTable;
use App\Models\PenilaianMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PenilaianMagangResource extends Resource
{
    public static function getModel(): string
    {
        return PenilaianMagang::class;
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return Heroicon::OutlinedClipboardDocumentCheck;
    }

    public static function getNavigationLabel(): string
    {
        return 'Penilaian Magang';
    }

    public static function getModelLabel(): string
    {
        return 'Penilaian Magang';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Penilaian Magang';
    }

    public static function getRecordTitleAttribute(): ?string
    {
        return 'nama';
    }

    public static function form(Schema $schema): Schema
    {
        return PenilaianMagangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenilaianMagangsTable::configure($table);
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
            'index' => ListPenilaianMagangs::route('/'),
            'create' => CreatePenilaianMagang::route('/create'),
            'edit' => EditPenilaianMagang::route('/{record}/edit'),
        ];
    }
}
