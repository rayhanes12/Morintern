<?php

namespace App\Filament\Admin\Resources\PesertaCalons\Pages;

use App\Filament\Admin\Resources\PesertaCalons\PesertaCalonResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPesertaCalon extends EditRecord
{
    protected static string $resource = PesertaCalonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
