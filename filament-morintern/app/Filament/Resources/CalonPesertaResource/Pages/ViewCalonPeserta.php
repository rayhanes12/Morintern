<?php

namespace App\Filament\Resources\CalonPesertaResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\CalonPesertaResource;

class ViewCalonPeserta extends ViewRecord
{
    protected static string $resource = CalonPesertaResource::class;

    protected static string $view = 'filament.resources.calon-peserta.pages.view-calon-peserta';
}
