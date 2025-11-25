<?php

namespace App\Filament\Admin\Resources\PostinganMagangResource\Pages;

use App\Filament\Admin\Resources\PostinganMagangResource;
use App\Filament\Admin\Resources\PostinganMagangResource\Schemas\FormSchema;
use Filament\Resources\Pages\EditRecord;

class EditPostinganMagang extends EditRecord
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getFormSchema(): array
    {
        return FormSchema::make();
    }
}
