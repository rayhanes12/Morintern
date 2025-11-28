<?php

namespace App\Filament\Admin\Resources\PesertaCalons\Pages;

use App\Filament\Admin\Resources\PesertaCalons\PesertaCalonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPesertaCalons extends ListRecords
{
    protected static string $resource = PesertaCalonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
