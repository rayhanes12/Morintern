<?php

namespace App\Filament\Admin\Resources\PostinganMagangs;

use App\Filament\Admin\Resources\PostinganMagangs\Pages\CreatePostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangs\Pages\EditPostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangs\Pages\ListPostinganMagangs;
use App\Filament\Admin\Resources\PostinganMagangs\Pages\ViewPostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangs\Schemas\PostinganMagangForm;
use App\Filament\Admin\Resources\PostinganMagangs\Schemas\PostinganMagangInfolist;
use App\Filament\Admin\Resources\PostinganMagangs\Tables\PostinganMagangsTable;
use App\Models\PostinganMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostinganMagangResource extends Resource
{
    protected static ?string $model = PostinganMagang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return PostinganMagangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PostinganMagangInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostinganMagangsTable::configure($table);
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
            'index' => ListPostinganMagangs::route('/'),
            'create' => CreatePostinganMagang::route('/create'),
            'view' => ViewPostinganMagang::route('/{record}'),
            'edit' => EditPostinganMagang::route('/{record}/edit'),
        ];
    }
}
