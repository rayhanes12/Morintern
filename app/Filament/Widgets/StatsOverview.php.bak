<?php

namespace App\Filament\Widgets;

use App\Models\CalonPeserta;
use App\Models\Spesialisasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Calon Peserta', CalonPeserta::count())
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Peserta Diterima', CalonPeserta::where('status', 'Diterima')->count())
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Total Spesialisasi', Spesialisasi::count())
                ->icon('heroicon-o-rectangle-stack')
                ->color('warning'),
        ];
    }
}
