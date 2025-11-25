<?php

namespace App\Filament\Admin\Resources\PostinganMagangResource\Pages;

use App\Filament\Admin\Resources\PostinganMagangResource;
use App\Filament\Admin\Resources\PostinganMagangResource\Schemas\FormSchema;
use Filament\Resources\Pages\CreateRecord;

class CreatePostinganMagang extends CreateRecord
{
    protected static string $resource = PostinganMagangResource::class;

    protected function getFormSchema(): array
    {
        return FormSchema::make();
    }
}
