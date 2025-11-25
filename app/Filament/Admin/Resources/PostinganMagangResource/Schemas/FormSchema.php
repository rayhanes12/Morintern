<?php

namespace App\Filament\Admin\Resources\PostinganMagangResource\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class FormSchema
{
    public static function make(): array
    {
        return [
            Select::make('spesialisasi_id')
                ->label('Spesialisasi')
                ->relationship('spesialisasi', 'nama_spesialisasi')
                ->searchable()
                ->preload(),

            TextInput::make('judul_posisi')->label('Nama Posisi')->required()->maxLength(191),

            Textarea::make('deskripsi')->label('Deskripsi Pekerjaan')->rows(6),

            TextInput::make('durasi')->label('Durasi Magang')->maxLength(100),

            TextInput::make('kuota')->label('Kuota')->numeric(),

            FileUpload::make('ilustrasi')
                ->label('Ilustrasi (opsional)')
                ->image()
                ->directory('postingan')
                ->maxSize(2048)
                ->nullable(),
        ];
    }
}
