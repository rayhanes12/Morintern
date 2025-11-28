<?php

namespace App\Filament\Admin\Resources\Pesertas\Pages;

use App\Filament\Admin\Resources\Pesertas\PesertaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPesertas extends ListRecords
{
    protected static string $resource = PesertaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
