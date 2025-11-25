<?php

namespace App\Filament\Admin\Resources\CalonPesertaResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;

class FormSchema
{
    public static function make(): array
    {
        return [
            TextInput::make('nama_lengkap')->label('Nama Lengkap')->required()->maxLength(191),
            TextInput::make('nim')->label('NIM')->maxLength(50),
            TextInput::make('asal_universitas')->label('Asal Universitas')->maxLength(191),
            TextInput::make('no_telepon')->label('Nomor Telepon')->tel()->maxLength(30),
            TextInput::make('email')->label('Email')->email()->maxLength(191),
            Select::make('spesialisasi_id')
                ->label('Spesialisasi')
                ->relationship('spesialisasi', 'nama_spesialisasi')
                ->searchable()
                ->preload(),
            DatePicker::make('tanggal_mulai')->label('Tanggal Mulai')->nullable(),
            DatePicker::make('tanggal_selesai')->label('Tanggal Selesai')->nullable(),
            Textarea::make('surat_lamaran')->label('Catatan / Surat Lamaran')->rows(4)->nullable(),
        ];
    }
}
