<?php

namespace App\Filament\Admin\Resources\Pesertas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PesertaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_lengkap'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('google_id')
                    ->placeholder('-'),
                TextEntry::make('no_telp')
                    ->placeholder('-'),
                TextEntry::make('ketua_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('konten_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('perusahaan_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('tanggal_daftar')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('status_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('kelompok_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('universitas')
                    ->placeholder('-'),
                TextEntry::make('jurusan')
                    ->placeholder('-'),
                TextEntry::make('email_verified_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('github')
                    ->placeholder('-'),
                TextEntry::make('linkedin')
                    ->placeholder('-'),
                TextEntry::make('cv')
                    ->placeholder('-'),
                TextEntry::make('surat')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
