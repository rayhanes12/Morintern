<?php

namespace App\Filament\Admin\Resources\PenilaianMagangResource\Schemas;

use App\Models\Peserta;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class FormSchema
{
    public static function make(): array
    {
        return [
            Select::make('peserta_id')
                ->label('Pilih Anggota Magang')
                ->relationship('peserta', 'nama_lengkap')
                ->searchable()
                ->getSearchResultsUsing(function (string $search) {
                    if (! $search) {
                        return Peserta::limit(10)->pluck('nama_lengkap', 'id')->toArray();
                    }

                    return Peserta::query()
                        ->where('nama_lengkap', 'like', "%{$search}%")
                        ->orWhere('universitas', 'like', "%{$search}%")
                        ->limit(50)
                        ->pluck('nama_lengkap', 'id')
                        ->toArray();
                })
                ->required(),

            TextInput::make('nilai_rata_rata')
                ->label('Nilai')
                ->numeric()
                ->min(1)
                ->max(100)
                ->required(),

            Textarea::make('masukan')
                ->label('Masukan / Catatan')
                ->rows(4)
                ->nullable(),

            FileUpload::make('file_penilaian')
                ->label('Upload File Penilaian')
                ->acceptedFileTypes(['image/jpeg','image/png','application/pdf'])
                ->maxSize(2048)
                ->directory('penilaian')
                ->preserveFilenames()
                ->nullable(),
        ];
    }
}
