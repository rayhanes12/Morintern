<?php

namespace App\Filament\Admin\Resources\PostinganMagangs\Pages;

use App\Filament\Admin\Resources\PostinganMagangs\PostinganMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostinganMagangs extends ListRecords
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
