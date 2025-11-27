<?php

namespace App\Filament\Resources\Spesialisasis\Pages;

use App\Filament\Resources\Spesialisasis\SpesialisasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSpesialisasis extends ManageRecords
{
    protected static string $resource = SpesialisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
