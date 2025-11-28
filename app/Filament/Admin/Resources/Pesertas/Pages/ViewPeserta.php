<?php

namespace App\Filament\Admin\Resources\Pesertas\Pages;

use App\Filament\Admin\Resources\Pesertas\PesertaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPeserta extends ViewRecord
{
    protected static string $resource = PesertaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
