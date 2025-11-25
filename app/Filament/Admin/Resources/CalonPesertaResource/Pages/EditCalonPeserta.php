<?php

namespace App\Filament\Admin\Resources\CalonPesertaResource\Pages;

use App\Filament\Admin\Resources\CalonPesertaResource;
use App\Filament\Admin\Resources\CalonPesertaResource\Schemas\FormSchema;
use Filament\Resources\Pages\EditRecord;

class EditCalonPeserta extends EditRecord
{
    protected static string $resource = CalonPesertaResource::class;

    protected function getFormSchema(): array
    {
        return FormSchema::make();
    }
}

