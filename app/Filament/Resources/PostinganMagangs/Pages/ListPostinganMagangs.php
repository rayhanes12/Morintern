<?php

namespace App\Filament\Resources\PostinganMagangs\Pages;

use App\Filament\Resources\PostinganMagangs\PostinganMagangResource;
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
