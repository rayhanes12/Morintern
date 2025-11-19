<?php

namespace App\Filament\Admin\Resources\CalonPesertas\Pages;

use App\Filament\Admin\Resources\CalonPesertas\CalonPesertaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCalonPeserta extends EditRecord
{
    protected static string $resource = CalonPesertaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
