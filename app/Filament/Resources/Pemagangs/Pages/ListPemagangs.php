<?php

namespace App\Filament\Resources\Pemagangs\Pages;

use App\Filament\Resources\Pemagangs\PemagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPemagangs extends ListRecords
{
    protected static string $resource = PemagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
