<?php

namespace App\Filament\Admin\Resources\Pesertas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PesertaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('google_id'),
                TextInput::make('no_telp')
                    ->tel(),
                TextInput::make('ketua_id')
                    ->numeric(),
                TextInput::make('konten_id')
                    ->numeric(),
                TextInput::make('perusahaan_id')
                    ->numeric(),
                DateTimePicker::make('tanggal_daftar'),
                TextInput::make('status_id')
                    ->numeric(),
                TextInput::make('kelompok_id')
                    ->numeric(),
                TextInput::make('universitas'),
                TextInput::make('jurusan'),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('github'),
                TextInput::make('linkedin'),
                TextInput::make('cv'),
                TextInput::make('surat'),
            ]);
    }
}
