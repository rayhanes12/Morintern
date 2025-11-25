<?php

namespace App\Filament\Admin\Widgets;

use Filament\Tables\Contracts\HasTable;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Actions\Action;
use App\Models\CalonPeserta;
use Filament\Widgets\Widget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\DateColumn;
use Illuminate\Database\Eloquent\Builder;

class StatusCalonPeserta extends Widget implements HasTable, HasActions, HasActions
{
    use InteractsWithActions;
    use InteractsWithTable;
    protected string $view = 'filament.admin.widgets.status-calon-peserta';
    protected function getTableQuery(): Builder
    {
        return CalonPeserta::query()
            ->with('spesialisasi')
            ->whereIn('status', ['diterima', 'ditolak'])
            ->orderByDesc('created_at');
    }
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('nama_lengkap')->label('Nama')->searchable()->limit(30),
            TextColumn::make('asal_universitas')->label('Universitas')->searchable()->limit(30),
            TextColumn::make('spesialisasi.nama_spesialisasi')->label('Spesialisasi')->limit(30),
            DateColumn::make('created_at')->label('Tanggal Daftar')->since(),
            BadgeColumn::make('status')
                ->label('Status')
                ->enum([
                    'diterima' => 'Diterima',
                    'ditolak' => 'Ditolak',
                ])
                ->colors([
                    'success' => 'diterima',
                    'danger' => 'ditolak',
                ]),
        ];
    }
    protected function getTableActions(): array
    {
        return [
            Action::make('view')
                ->label('View')
                ->url(fn (CalonPeserta $record): string => route('filament.resources.calon-pesertas.edit', $record)),
            // edit/delete normally available via resource; widgets show view-only
        ];
    }
}
