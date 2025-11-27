<?php

namespace App\Filament\Resources\PesertaCalons\Pages;

use App\Filament\Resources\PesertaCalons\PesertaCalonResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListCalonPesertas extends ListRecords
{
    protected static string $resource = PesertaCalonResource::class;

    public function getTabs(): array
    {
        return [
            'pendaftar' => Tab::make('Pendaftar')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pendaftar')),
            'diterima' => Tab::make('Diterima')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'diterima')),
            'ditolak' => Tab::make('Ditolak')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'ditolak')),
        ];
    }
}