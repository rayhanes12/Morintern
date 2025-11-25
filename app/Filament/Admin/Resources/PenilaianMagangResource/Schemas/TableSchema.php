<?php

namespace App\Filament\Admin\Resources\PenilaianMagangResource\Schemas;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use App\Models\PenilaianMagang;
use Filament\Tables\Columns\TextColumn;

class TableSchema
{
    public static function make(): array
    {
        return [
            'columns' => [
                TextColumn::make('peserta.nama_lengkap')->label('Peserta')->searchable(),
                TextColumn::make('nilai_rata_rata')->label('Nilai')->sortable(),
                TextColumn::make('masukan')->label('Masukan')->limit(50),
                TextColumn::make('file_penilaian')
                    ->label('File')
                    ->formatStateUsing(fn ($state, $record) => $state ? 'Download' : ''),
                TextColumn::make('created_at')->label('Created At')->date(),
            ],
            'actions' => [
                EditAction::make(),
                DeleteAction::make(),
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-download')
                    ->url(fn (PenilaianMagang $record) => $record->file_penilaian ? asset('storage/' . ltrim($record->file_penilaian, '/')) : null)
                    ->openUrlInNewTab()
                    ->visible(fn (PenilaianMagang $record) => (bool) $record->file_penilaian),
            ],
            'defaultSort' => ['created_at', 'desc'],
        ];
    }
}
