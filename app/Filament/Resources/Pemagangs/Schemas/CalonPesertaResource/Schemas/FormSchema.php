<?php

namespace App\Filament\Resources\CalonPesertaResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use App\Models\Spesialisasi;

class FormSchema
{
    public static function get(): array
    {
        return [
            TextInput::make('nama_lengkap')
                ->required()
                ->maxLength(255),
            TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true), // Security: hindari duplicate
            Select::make('spesialisasi_id')
                ->relationship('spesialisasi', 'nama_spesialisasi')
                ->options(Spesialisasi::pluck('nama_spesialisasi', 'id'))
                ->searchable(), // UX: searchable untuk spesialisasi banyak
            FileUpload::make('cv')
                ->disk('public') // Security: gunakan storage disk aman
                ->directory('cvs')
                ->preserveFilenames(),
            // Tambah fields lain seperti no_telp, universitas_id, dll.
        ];
    }
}