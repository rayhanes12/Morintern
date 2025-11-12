<?php

namespace App\Filament\Resources\CalonPesertas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CalonPesertasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('asal_universitas')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('jurusan')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('spesialisasi.nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->searchable()
                    ->sortable(),
                
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pendaftar',
                        'success' => 'diterima',
                        'danger' => 'ditolak',
                    ]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
