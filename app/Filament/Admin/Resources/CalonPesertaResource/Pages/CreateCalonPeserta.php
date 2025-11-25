<?php

namespace App\Filament\Admin\Resources\CalonPesertaResource\Pages;

use App\Filament\Admin\Resources\CalonPesertaResource;
use App\Filament\Admin\Resources\CalonPesertaResource\Schemas\FormSchema;
use Filament\Resources\Pages\CreateRecord;

class CreateCalonPeserta extends CreateRecord
{
    protected static string $resource = CalonPesertaResource::class;

    protected function getFormSchema(): array
    {
        return FormSchema::make();
    }
}
