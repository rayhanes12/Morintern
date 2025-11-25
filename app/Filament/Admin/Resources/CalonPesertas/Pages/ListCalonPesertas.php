<?php

namespace App\Filament\Admin\Resources\CalonPesertas\Pages;

use App\Filament\Admin\Resources\CalonPesertas\CalonPesertaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCalonPesertas extends ListRecords
{
    protected static string $resource = CalonPesertaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
