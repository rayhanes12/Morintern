<?php

namespace App\Filament\Resources\PerguruanTinggis\Pages;

use App\Filament\Resources\PerguruanTinggis\PerguruanTinggiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePerguruanTinggis extends ManageRecords
{
    protected static string $resource = PerguruanTinggiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
