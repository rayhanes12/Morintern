<?php

namespace App\Filament\Admin\Resources\CalonPesertaResource\Schemas;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class TableSchema
{
    public static function make(): array
    {
        return [
            'columns' => [
                TextColumn::make('nama_lengkap')->label('Nama')->searchable()->sortable(),
                TextColumn::make('asal_universitas')->label('Universitas')->searchable()->sortable(),
                TextColumn::make('spesialisasi.nama_spesialisasi')->label('Spesialisasi')->toggleable()->searchable(),
                TextColumn::make('created_at')->label('Tanggal Daftar')->date()->sortable(),
                BadgeColumn::make('status')->enum([
                    'pendaftar' => 'Pending',
                    'diterima' => 'Diterima',
                    'ditolak' => 'Ditolak',
                ])->colors([
                    'secondary',
                    'success' => 'diterima',
                    'danger' => 'ditolak',
                ])->sortable(),
            ],
        ];
    }
}
