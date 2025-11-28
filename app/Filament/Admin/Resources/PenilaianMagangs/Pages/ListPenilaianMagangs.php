<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs\Pages;

use App\Filament\Admin\Resources\PenilaianMagangs\PenilaianMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianMagangs extends ListRecords
{
    protected static string $resource = PenilaianMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
