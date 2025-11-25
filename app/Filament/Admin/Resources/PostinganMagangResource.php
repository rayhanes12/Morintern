<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PostinganMagangResource\Pages\ListPostinganMagangs;
use App\Filament\Admin\Resources\PostinganMagangResource\Pages\CreatePostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangResource\Pages\EditPostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangResource\Pages;
use App\Models\PostinganMagang;
use Filament\Resources\Resource;

class PostinganMagangResource extends Resource
{
    protected static ?string $model = PostinganMagang::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Postingan Magang';

    // Page-centric: pages implement form/table schemas
    public static function getPages(): array
    {
        return [
            'index' => ListPostinganMagangs::route('/'),
            'create' => CreatePostinganMagang::route('/create'),
            'edit' => EditPostinganMagang::route('/{record}/edit'),
        ];
    }
}
