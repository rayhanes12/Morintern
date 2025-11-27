<?php

namespace App\Filament\Resources\PenilaianMagangs\Pages;

use App\Filament\Resources\PenilaianMagangs\PenilaianMagangResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPenilaianMagang extends ViewRecord
{
    protected static string $resource = PenilaianMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
