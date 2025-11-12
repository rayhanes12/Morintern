<?php

namespace App\Filament\Resources\PostinganMagangResource\Pages;

use App\Filament\Resources\PostinganMagangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostinganMagang extends EditRecord
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
