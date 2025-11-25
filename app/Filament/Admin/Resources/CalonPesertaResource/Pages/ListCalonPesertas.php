<?php

namespace App\Filament\Admin\Resources\CalonPesertaResource\Pages;

use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\CalonPesertaResource;
use App\Models\CalonPeserta;
use App\Filament\Admin\Resources\CalonPesertaResource\Schemas\TableSchema;
use Filament\Resources\Pages\ListRecords;

class ListCalonPesertas extends ListRecords
{
    protected static string $resource = CalonPesertaResource::class;

    protected function getTableQuery(): Builder
    {
        return CalonPeserta::query()->with('spesialisasi');
    }

    protected function getTableColumns(): array
    {
        $schema = TableSchema::make();

        return $schema['columns'] ?? [];
    }
}
