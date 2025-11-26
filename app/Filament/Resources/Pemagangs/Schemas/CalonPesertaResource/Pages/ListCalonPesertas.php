<?php

namespace App\Filament\Resources\CalonPesertaResource\Pages;

use App\Filament\Resources\CalonPesertaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalonPesertas extends ListRecords
{
    protected static string $resource = CalonPesertaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // Jika butuh custom view: protected static string $view = 'filament.resources.calon-peserta.list';
}