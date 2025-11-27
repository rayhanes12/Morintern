<?php

namespace App\Filament\Resources\PostinganMagangs\Pages;

use App\Filament\Resources\PostinganMagangs\PostinganMagangResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPostinganMagang extends ViewRecord
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
