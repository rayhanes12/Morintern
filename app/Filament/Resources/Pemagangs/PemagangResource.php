<?php

namespace App\Filament\Resources\Pemagangs;

use App\Filament\Resources\Pemagangs\Pages\CreatePemagang;
use App\Filament\Resources\Pemagangs\Pages\EditPemagang;
use App\Filament\Resources\Pemagangs\Pages\ListPemagangs;
use App\Filament\Resources\Pemagangs\Schemas\PemagangForm;
use App\Filament\Resources\Pemagangs\Tables\PemagangsTable;
use App\Models\Pemagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemagangResource extends Resource
{
    protected static ?string $model = Pemagang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Pemagang';

    public static function form(Schema $schema): Schema
    {
        return PemagangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PemagangsTable::configure($table);
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
            'index' => ListPemagangs::route('/'),
            'create' => CreatePemagang::route('/create'),
            'edit' => EditPemagang::route('/{record}/edit'),
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
