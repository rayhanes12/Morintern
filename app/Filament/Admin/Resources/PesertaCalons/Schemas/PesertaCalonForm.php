<?php

namespace App\Filament\Admin\Resources\PesertaCalons\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PesertaCalonForm
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
                    ->password(),
                TextInput::make('no_telp')
                    ->tel(),
                TextInput::make('universitas_id'),
                TextInput::make('jurusan_id'),
                Select::make('spesialisasi_id')
                    ->relationship('spesialisasi', 'id'),
                TextInput::make('kelompok_id')
                    ->numeric(),
                Select::make('ketua_id')
                    ->relationship('ketua', 'id'),
                TextInput::make('perusahaan_id')
                    ->numeric(),
                DatePicker::make('tanggal_mulai'),
                DatePicker::make('tanggal_selesai'),
                TextInput::make('github'),
                TextInput::make('linkedin'),
                TextInput::make('cv'),
                TextInput::make('surat'),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'applied' => 'Applied',
            'accepted' => 'Accepted',
            'rejected' => 'Rejected',
        ])
                    ->default('pending')
                    ->required(),
                TextInput::make('google_id'),
            ]);
    }
}
