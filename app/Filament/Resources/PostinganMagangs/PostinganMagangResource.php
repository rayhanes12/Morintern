<?php

namespace App\Filament\Resources\PostinganMagangs;

use App\Filament\Resources\PostinganMagangs\Pages\CreatePostinganMagang;
use App\Filament\Resources\PostinganMagangs\Pages\EditPostinganMagang;
use App\Filament\Resources\PostinganMagangs\Pages\ListPostinganMagangs;
use App\Filament\Resources\PostinganMagangs\Schemas\PostinganMagangForm;
use App\Filament\Resources\PostinganMagangs\Tables\PostinganMagangsTable;
use App\Models\PostinganMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostinganMagangResource extends Resource
{
    protected static ?string $model = PostinganMagang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $navigationLabel = 'Postingan Magang';

    protected static ?string $modelLabel = 'Postingan Magang';

    protected static ?string $pluralModelLabel = 'Postingan Magang';

    protected static ?string $recordTitleAttribute = 'judul_posisi';

    public static function form(Schema $schema): Schema
    {
        return PostinganMagangForm::configure($schema);
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
            'edit' => EditPostinganMagang::route('/{record}/edit'),
        ];
    }
}
