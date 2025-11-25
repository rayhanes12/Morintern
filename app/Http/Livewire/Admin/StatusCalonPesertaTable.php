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

class StatusCalonPesertaTable extends Component implements HasActions
{
    use InteractsWithActions;
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return CalonPeserta::query()->with('spesialisasi')->whereIn('status', ['diterima', 'ditolak']);
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
                    'diterima' => 'Diterima',
                    'ditolak' => 'Ditolak',
                    'pendaftar' => 'Pending',
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
                ->url(fn (CalonPeserta $record) => url('admin/resources/calon-pesertas/' . $record->id . '/edit')),
        ];
    }

    public function render()
    {
        return view('livewire.admin.status-calon-peserta-table');
    }
}
