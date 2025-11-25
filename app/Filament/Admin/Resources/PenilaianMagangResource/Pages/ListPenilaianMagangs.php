<?php

namespace App\Filament\Admin\Resources\PenilaianMagangResource\Pages;

use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\PenilaianMagangResource;
use App\Models\PenilaianMagang;
use App\Filament\Admin\Resources\PenilaianMagangResource\Schemas\TableSchema;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\LinkAction;
use Illuminate\Support\Facades\Storage;

class ListPenilaianMagangs extends ListRecords
{
    protected static string $resource = PenilaianMagangResource::class;

    protected function getTableQuery(): Builder
    {
        return PenilaianMagang::query()->with('peserta');
    }

    protected function getTableColumns(): array
    {
        $schema = TableSchema::make();

        // allow customization for wrapping/limits in pages if needed
        if (! empty($schema['columns'])) {
            return $schema['columns'];
        }

        return [];
    }

    protected function getTableActions(): array
    {
        $schema = TableSchema::make();

        return $schema['actions'] ?? [];
    }
}
