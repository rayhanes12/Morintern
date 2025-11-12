<?php

namespace App\Filament\Widgets;

use App\Models\CalonPeserta;
use App\Models\Spesialisasi;
use Filament\Widgets\ChartWidget;

class SpesialisasiChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Peserta per Spesialisasi';

    protected function getData(): array
    {
        $data = Spesialisasi::withCount('calonPesertas')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Spesialisasi',
                    'data' => $data->pluck('calon_pesertas_count'),
                    'backgroundColor' => ['#f59e0b', '#84cc16', '#3b82f6', '#ec4899'],
                ],
            ],
            'labels' => $data->pluck('nama')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
