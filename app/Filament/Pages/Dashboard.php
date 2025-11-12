<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\PendaftaranChart;
use App\Filament\Widgets\SpesialisasiChart;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            PendaftaranChart::class,
            SpesialisasiChart::class,
        ];
    }
}
