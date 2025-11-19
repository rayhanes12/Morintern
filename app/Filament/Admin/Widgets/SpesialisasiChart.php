<?php

namespace App\Filament\Admin\Widgets;

use App\Models\CalonPeserta;
use App\Models\Spesialisasi;
use Filament\Widgets\ChartWidget;

class SpesialisasiChart extends ChartWidget
{
    public function getHeading(): ?string
    {
        return 'Distribusi Peserta per Spesialisasi';
    }
    
    public static function getSort(): ?int
    {
        return 3;
    }

    protected function getData(): array
    {
        $data = Spesialisasi::withCount('calonPesertas')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Spesialisasi',
                    'data' => $data->pluck('calon_pesertas_count'),
                    'backgroundColor' => [
                        '#6F8FF9',
                        '#84cc16',
                        '#f59e0b',
                        '#ec4899',
                        '#8b5cf6',
                        '#14b8a6'
                    ],
                ],
            ],
            'labels' => $data->pluck('nama_spesialisasi')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
