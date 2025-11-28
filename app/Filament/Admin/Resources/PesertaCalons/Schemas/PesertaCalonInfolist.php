<?php

namespace App\Filament\Admin\Resources\PesertaCalons\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PesertaCalonInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_lengkap'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('no_telp')
                    ->placeholder('-'),
                TextEntry::make('universitas_id')
                    ->placeholder('-'),
                TextEntry::make('jurusan_id')
                    ->placeholder('-'),
                TextEntry::make('spesialisasi.id')
                    ->label('Spesialisasi')
                    ->placeholder('-'),
                TextEntry::make('kelompok_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('ketua.id')
                    ->label('Ketua')
                    ->placeholder('-'),
                TextEntry::make('perusahaan_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('tanggal_mulai')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('tanggal_selesai')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('github')
                    ->placeholder('-'),
                TextEntry::make('linkedin')
                    ->placeholder('-'),
                TextEntry::make('cv')
                    ->placeholder('-'),
                TextEntry::make('surat')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('google_id')
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
