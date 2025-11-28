<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PenilaianMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nilai_rata_rata')
                    ->numeric(),
                Textarea::make('masukan')
                    ->columnSpanFull(),
                TextInput::make('file_penilaian'),
                TextInput::make('peserta_id')
                    ->numeric(),
            ]);
    }
}
