<?php

namespace App\Filament\Resources\CalonPesertaResource\Pages;

use App\Filament\Resources\CalonPesertaResource;
use App\Filament\Resources\CalonPesertaResource\Widgets\PendaftarTable;
use App\Filament\Resources\CalonPesertaResource\Widgets\DiterimaTable;
use App\Filament\Resources\CalonPesertaResource\Widgets\DitolakTable;
use Filament\Resources\Pages\Page;

class ManageCalonPeserta extends Page
{
    protected static string $resource = CalonPesertaResource::class;
    protected static string $view = 'filament.calon-peserta.pages.manage-calon-peserta';
    protected static ?string $title = 'Manage Calon Peserta';

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }

    public function getWidgets(): array
    {
        return [
            PendaftarTable::class,
            DiterimaTable::class,
            DitolakTable::class,
        ];
    }
}
