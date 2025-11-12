<?php

namespace App\Filament\Resources\PostinganMagangs\Pages;

use App\Filament\Resources\PostinganMagangs\PostinganMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPostinganMagang extends EditRecord
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
