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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PendingCalonPeserta extends Widget implements HasTable, HasActions, HasActions
{
    use InteractsWithActions;
    use InteractsWithTable;
    protected string $view = 'filament.admin.widgets.pending-calon-peserta';
    protected function getTableQuery(): Builder
    {
        return CalonPeserta::query()
            ->with('spesialisasi')
            ->where('status', 'pending')
            ->orderByDesc('created_at');
    }
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('nama_lengkap')->label('Nama')->searchable()->limit(30),
            TextColumn::make('asal_universitas')->label('Universitas')->searchable()->limit(30),
            TextColumn::make('spesialisasi.nama_spesialisasi')->label('Spesialisasi')->limit(30),
            DateColumn::make('created_at')->label('Tanggal Daftar')->sortable()->since(),
            BadgeColumn::make('status')
                ->label('Status')
                ->enum([
                    'pending' => 'Pending',
                    'diterima' => 'Diterima',
                    'ditolak' => 'Ditolak',
                ])
                ->colors([
                    'secondary' => 'pending',
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
            Action::make('accept')
                ->label('Accept')
                ->color('success')
                ->requiresConfirmation()
                ->action(function (CalonPeserta $record) {
                    DB::transaction(function () use ($record) {
                        $record->status = 'diterima';
                        $record->save();

                        Log::info('CalonPeserta accepted via admin widget', [
                            'admin' => auth()->id(),
                            'calon_id' => $record->id,
                        ]);
                    });
                    $this->emit('refreshTable');
                })
                ->visible(fn () => optional(auth()->user())->can('approve-calon')), // optional: implement permission later
            Action::make('reject')
                ->label('Reject')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function (CalonPeserta $record) {
                    DB::transaction(function () use ($record) {
                        $record->status = 'ditolak';
                        $record->save();

                        Log::info('CalonPeserta rejected via admin widget', [
                            'admin' => auth()->id(),
                            'calon_id' => $record->id,
                        ]);
                    });
                    $this->emit('refreshTable');
                })
                ->visible(fn () => optional(auth()->user())->can('reject-calon')),
        ];
    }
    protected function getTableFilters(): array
    {
        return [
            //
        ];
    }
}
