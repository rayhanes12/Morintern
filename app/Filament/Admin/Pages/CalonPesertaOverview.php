<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;


class CalonPesertaOverview extends Page
{
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Kelola Calon Peserta';
    protected static ?int $navigationSort = 2;
    protected static ?string $slug = 'calon-peserta-overview';
    protected ?string $view = 'filament.admin.pages.calon-peserta-overview';

    protected static string | \UnitEnum | null $navigationGroup = 'Dashboard';
}
