<?php

namespace App\Filament\Admin\Resources\PesertaCalons\Pages;

use App\Filament\Admin\Resources\PesertaCalons\PesertaCalonResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPesertaCalon extends ViewRecord
{
    protected static string $resource = PesertaCalonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
