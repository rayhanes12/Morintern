<?php

namespace App\Filament\Admin\Resources\PostinganMagangs\Pages;

use App\Filament\Admin\Resources\PostinganMagangs\PostinganMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPostinganMagang extends EditRecord
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
