<?php

namespace App\Filament\Resources\Pemagangs\Pages;

use App\Filament\Resources\Pemagangs\PemagangResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPemagang extends EditRecord
{
    protected static string $resource = PemagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
