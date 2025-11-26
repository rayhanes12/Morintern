<?php

namespace App\Filament\Resources\PesertaCalons\Pages;

use App\Filament\Resources\PesertaCalons\PesertaCalonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePesertaCalons extends ManageRecords
{
    protected static string $resource = PesertaCalonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
