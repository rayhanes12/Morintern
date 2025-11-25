<?php

namespace App\Http\Livewire\Admin;

use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Action;
use Livewire\Component;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CalonPeserta;

class PendingCalonPesertaTable extends Component implements HasActions
{
    use InteractsWithActions;
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return CalonPeserta::query()->with('spesialisasi')->where('status', 'pendaftar');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('nama_lengkap')->label('Nama')->searchable(),
            TextColumn::make('asal_universitas')->label('Universitas')->searchable(),
            TextColumn::make('spesialisasi.nama_spesialisasi')->label('Spesialisasi')->searchable(),
            TextColumn::make('created_at')->label('Tanggal Daftar')->date(),
            BadgeColumn::make('status')
                ->label('Status')
                ->enum([
                    'pendaftar' => 'Pending',
                    'diterima' => 'Diterima',
                    'ditolak' => 'Ditolak',
                ])
                ->colors([
                    'warning' => 'pendaftar',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')
                ->label('View')
                ->url(fn (CalonPeserta $record) => url('admin/resources/calon-pesertas/' . $record->id . '/edit')),

            Action::make('accept')
                ->label('Accept')
                ->requiresConfirmation()
                ->action(function (CalonPeserta $record) {
                    $record->update(['status' => 'diterima']);
                    $this->emit('refreshPendingTable');
                    $this->emit('refreshStatusTable');
                })
                ->color('success'),

            Action::make('reject')
                ->label('Reject')
                ->requiresConfirmation()
                ->action(function (CalonPeserta $record) {
                    $record->update(['status' => 'ditolak']);
                    $this->emit('refreshPendingTable');
                    $this->emit('refreshStatusTable');
                })
                ->color('danger'),
        ];
    }

    public function render()
    {
        return view('livewire.admin.pending-calon-peserta-table');
    }
}
