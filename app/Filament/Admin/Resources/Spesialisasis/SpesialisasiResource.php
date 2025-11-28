<?php

namespace App\Filament\Admin\Resources\Spesialisasis;

use App\Filament\Admin\Resources\Spesialisasis\Pages\CreateSpesialisasi;
use App\Filament\Admin\Resources\Spesialisasis\Pages\EditSpesialisasi;
use App\Filament\Admin\Resources\Spesialisasis\Pages\ListSpesialisasis;
use App\Filament\Admin\Resources\Spesialisasis\Schemas\SpesialisasiForm;
use App\Filament\Admin\Resources\Spesialisasis\Tables\SpesialisasisTable;
use App\Models\Spesialisasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpesialisasiResource extends Resource
{
    protected static ?string $model = Spesialisasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_spesialisasi';

    public static function form(Schema $schema): Schema
    {
        return SpesialisasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpesialisasisTable::configure($table);
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
            'index' => ListSpesialisasis::route('/'),
            'create' => CreateSpesialisasi::route('/create'),
            'edit' => EditSpesialisasi::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
