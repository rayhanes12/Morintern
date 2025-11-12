<?php

namespace App\Filament\Resources\PostinganMagangResource\Pages;

use App\Filament\Resources\PostinganMagangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostinganMagangs extends ListRecords
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
