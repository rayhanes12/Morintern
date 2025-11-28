<?php

namespace App\Filament\Admin\Resources\PostinganMagangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostinganMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_posisi')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('durasi')
                    ->required(),
                TextInput::make('kuota')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
