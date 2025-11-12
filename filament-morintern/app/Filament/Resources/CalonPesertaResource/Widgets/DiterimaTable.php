<?php

namespace App\Filament\Resources\CalonPesertaResource\Widgets;

use App\Models\CalonPeserta;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Filament\Resources\CalonPesertaResource\Pages\ViewCalonPeserta;


class DiterimaTable extends TableWidget
{
    protected static ?string $heading = 'Tabel Diterima';

    protected function getTableQuery(): Builder|Relation|null
    {
        return CalonPeserta::query()->where('status', 'diterima');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('nama_lengkap')->label('Nama')->sortable(),
            Tables\Columns\TextColumn::make('asal_universitas')->label('Universitas'),
            Tables\Columns\TextColumn::make('spesialisasi')->label('Spesialisasi'),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal Daftar')->date(),
            Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->color('success'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('detail')
                ->label('Detail')
                ->button()
                ->color('primary')
                ->icon('heroicon-o-eye')
                ->url(fn (CalonPeserta $record) => ViewCalonPeserta::getUrl(['record' => $record]))
        ];
    }
}
