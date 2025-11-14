<?php

namespace App\Filament\Widgets;

use App\Models\CalonPeserta;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PendaftaranChart extends ChartWidget
{
    protected static ?string $heading = 'Pendaftaran Magang per Bulan';

    protected function getData(): array
    {
        $data = CalonPeserta::select(
            DB::raw('MONTH(tanggal_daftar) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $labels = array_map(function ($bulan) {
            return date('F', mktime(0, 0, 0, $bulan, 1));
        }, array_keys($data));

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => array_values($data),
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
