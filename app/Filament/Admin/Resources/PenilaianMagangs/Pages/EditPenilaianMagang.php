<?php

namespace App\Filament\Admin\Resources\PenilaianMagangs\Pages;

use App\Filament\Admin\Resources\PenilaianMagangs\PenilaianMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianMagang extends EditRecord
{
    protected static string $resource = PenilaianMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
