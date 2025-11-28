<?php

namespace App\Filament\Admin\Resources\Pesertas;

use App\Filament\Admin\Resources\Pesertas\Pages\CreatePeserta;
use App\Filament\Admin\Resources\Pesertas\Pages\EditPeserta;
use App\Filament\Admin\Resources\Pesertas\Pages\ListPesertas;
use App\Filament\Admin\Resources\Pesertas\Pages\ViewPeserta;
use App\Filament\Admin\Resources\Pesertas\Schemas\PesertaForm;
use App\Filament\Admin\Resources\Pesertas\Schemas\PesertaInfolist;
use App\Filament\Admin\Resources\Pesertas\Tables\PesertasTable;
use App\Models\Peserta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PesertaResource extends Resource
{
    protected static ?string $model = Peserta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return PesertaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PesertaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PesertasTable::configure($table);
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
            'index' => ListPesertas::route('/'),
            'create' => CreatePeserta::route('/create'),
            'view' => ViewPeserta::route('/{record}'),
            'edit' => EditPeserta::route('/{record}/edit'),
        ];
    }
}
