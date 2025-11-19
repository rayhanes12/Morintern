<?php

namespace App\Filament\Admin\Resources\PostinganMagangs;

use App\Filament\Admin\Resources\PostinganMagangs\Pages\CreatePostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangs\Pages\EditPostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangs\Pages\ListPostinganMagangs;
use App\Filament\Admin\Resources\PostinganMagangs\Schemas\PostinganMagangForm;
use App\Filament\Admin\Resources\PostinganMagangs\Tables\PostinganMagangsTable;
use App\Models\PostinganMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostinganMagangResource extends Resource
{
    public static function getModel(): string
    {
        return PostinganMagang::class;
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return Heroicon::OutlinedBriefcase;
    }

    public static function getNavigationLabel(): string
    {
        return 'Postingan Magang';
    }

    public static function getModelLabel(): string
    {
        return 'Postingan Magang';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Postingan Magang';
    }

    public static function getRecordTitleAttribute(): ?string
    {
        return 'judul_posisi';
    }

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
