<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PenilaianMagangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('nilai_rata_rata')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('masukan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('file_penilaian')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('peserta_id')
                    ->numeric()
                    ->placeholder('-'),
            ]);
    }
}
