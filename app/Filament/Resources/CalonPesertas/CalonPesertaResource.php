<?php

namespace App\Filament\Resources\CalonPesertas;

use App\Filament\Resources\CalonPesertas\Pages\CreateCalonPeserta;
use App\Filament\Resources\CalonPesertas\Pages\EditCalonPeserta;
use App\Filament\Resources\CalonPesertas\Pages\ListCalonPesertas;
use App\Filament\Resources\CalonPesertas\Schemas\CalonPesertaForm;
use App\Filament\Resources\CalonPesertas\Tables\CalonPesertasTable;
use App\Models\CalonPeserta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CalonPesertaResource extends Resource
{
    protected static ?string $model = CalonPeserta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $navigationLabel = 'Calon Peserta';

    protected static ?string $modelLabel = 'Calon Peserta';

    protected static ?string $pluralModelLabel = 'Calon Peserta';

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

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
