<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs;

use App\Filament\Admin\Resources\PenilaianMagangs\Pages\CreatePenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangs\Pages\EditPenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangs\Pages\ListPenilaianMagangs;
use App\Filament\Admin\Resources\PenilaianMagangs\Pages\ViewPenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangs\Schemas\PenilaianMagangForm;
use App\Filament\Admin\Resources\PenilaianMagangs\Schemas\PenilaianMagangInfolist;
use App\Filament\Admin\Resources\PenilaianMagangs\Tables\PenilaianMagangsTable;
use App\Models\PenilaianMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PenilaianMagangResource extends Resource
{
    protected static ?string $model = PenilaianMagang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'peserta_id';

    public static function form(Schema $schema): Schema
    {
        return PenilaianMagangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PenilaianMagangInfolist::configure($schema);
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
            'view' => ViewPenilaianMagang::route('/{record}'),
            'edit' => EditPenilaianMagang::route('/{record}/edit'),
        ];
    }
}
