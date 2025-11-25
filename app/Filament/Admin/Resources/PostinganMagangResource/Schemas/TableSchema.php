<?php

namespace App\Filament\Admin\Resources\PostinganMagangResource\Schemas;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class TableSchema
{
    public static function make(): array
    {
        return [
            'columns' => [
                ImageColumn::make('ilustrasi')
                    ->label('Image')
                    ->getStateUsing(fn ($record) => $record->ilustrasi ? asset('storage/' . ltrim($record->ilustrasi, '/')) : asset('assets/landing/placeholder-postingan.png'))
                    ->rounded(),

                TextColumn::make('judul_posisi')->label('Posisi')->searchable()->sortable(),
                TextColumn::make('durasi')->label('Durasi'),
                TextColumn::make('kuota')->label('Kuota'),
                TextColumn::make('created_at')->label('Created At')->date()->sortable(),
            ],
        ];
    }
}
