<?php

namespace App\Filament\Admin\Resources\PenilaianMagangResource\Pages;

use App\Filament\Admin\Resources\PenilaianMagangResource;
use App\Filament\Admin\Resources\PenilaianMagangResource\Schemas\FormSchema;
use Filament\Resources\Pages\CreateRecord;

class CreatePenilaianMagang extends CreateRecord
{
    protected static string $resource = PenilaianMagangResource::class;

    protected function getFormSchema(): array
    {
        return FormSchema::make();
    }
}
