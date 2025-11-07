<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\{
    StatsOverview,
    PendaftaranChart,
    SpesialisasiChart
};

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
