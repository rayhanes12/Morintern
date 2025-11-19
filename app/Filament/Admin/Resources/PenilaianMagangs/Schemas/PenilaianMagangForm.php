<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PenilaianMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('nilai_rata_rata')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                
                Textarea::make('masukan')
                    ->rows(5),
                
                FileUpload::make('file_penilaian')
                    ->directory('penilaian')
                    ->disk('local'),
            ]);
    }
}
