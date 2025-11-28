<?php

namespace App\Filament\Admin\Resources\PostinganMagangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PostinganMagangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul_posisi'),
                TextEntry::make('deskripsi')
                    ->columnSpanFull(),
                TextEntry::make('durasi'),
                TextEntry::make('kuota')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
