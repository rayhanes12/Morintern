<?php

namespace App\Filament\Resources\CalonPesertas\Schemas;

use App\Models\Spesialisasi;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CalonPesertaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('nim')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('asal_universitas')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('jurusan')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('no_telepon')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('github')
                    ->url()
                    ->maxLength(255),
                
                TextInput::make('linkedin')
                    ->url()
                    ->maxLength(255),
                
                DatePicker::make('tanggal_mulai')
                    ->required(),
                
                DatePicker::make('tanggal_selesai')
                    ->required(),
                
                FileUpload::make('cv')
                    ->required()
                    ->directory('uploads/cv')
                    ->disk('public'),
                
                FileUpload::make('surat_lamaran')
                    ->required()
                    ->directory('uploads/surat')
                    ->disk('public'),
                
                Select::make('spesialisasi_id')
                    ->label('Spesialisasi')
                    ->options(Spesialisasi::pluck('nama_spesialisasi', 'id'))
                    ->searchable(),
                
                Select::make('status')
                    ->options([
                        'pendaftar' => 'Pendaftar',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required(),
            ]);
    }
}
