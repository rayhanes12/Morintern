<?php

namespace App\Filament\Admin\Resources\PostinganMagangResource\Pages;

use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\PostinganMagangResource;
use App\Models\PostinganMagang;
use App\Filament\Admin\Resources\PostinganMagangResource\Schemas\TableSchema;
use Filament\Resources\Pages\ListRecords;

class ListPostinganMagangs extends ListRecords
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getTableQuery(): Builder
    {
        return PostinganMagang::query();
    }

    protected function getTableColumns(): array
    {
        $schema = TableSchema::make();

        return $schema['columns'] ?? [];
    }
}
