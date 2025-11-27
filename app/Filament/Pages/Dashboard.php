<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected ?string $heading = 'Dashboard Morintern';

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\CalonPesertaStats::class,
            \App\Filament\Widgets\PostinganChart::class,
        ];
    }
}