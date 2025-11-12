<?php

namespace App\Filament\Resources\PostinganMagangs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostinganMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_posisi')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('deskripsi')
                    ->required()
                    ->rows(5),
                
                TextInput::make('durasi')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('kuota')
                    ->required()
                    ->numeric()
                    ->minValue(1),
            ]);
    }
}
