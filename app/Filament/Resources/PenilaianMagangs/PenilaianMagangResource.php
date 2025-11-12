<?php

namespace App\Filament\Resources\PenilaianMagangs;

use App\Filament\Resources\PenilaianMagangs\Pages\CreatePenilaianMagang;
use App\Filament\Resources\PenilaianMagangs\Pages\EditPenilaianMagang;
use App\Filament\Resources\PenilaianMagangs\Pages\ListPenilaianMagangs;
use App\Filament\Resources\PenilaianMagangs\Schemas\PenilaianMagangForm;
use App\Filament\Resources\PenilaianMagangs\Tables\PenilaianMagangsTable;
use App\Models\PenilaianMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PenilaianMagangResource extends Resource
{
    protected static ?string $model = PenilaianMagang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Penilaian Magang';

    protected static ?string $modelLabel = 'Penilaian Magang';

    protected static ?string $pluralModelLabel = 'Penilaian Magang';

    protected static ?string $recordTitleAttribute = 'nama';

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
