<?php

namespace App\Filament\Admin\Widgets;

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
                ->description('Total pendaftar magang')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Peserta Diterima', CalonPeserta::where('status', 'diterima')->count())
                ->description('Peserta yang diterima')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Total Spesialisasi', Spesialisasi::count())
                ->description('Bidang spesialisasi tersedia')
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('warning'),
        ];
    }
}
