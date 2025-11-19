<?php

namespace App\Filament\Admin\Widgets;

use App\Models\CalonPeserta;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PendaftaranChart extends ChartWidget
{
    public function getHeading(): ?string
    {
        return 'Pendaftaran Magang per Bulan';
    }
    
    public static function getSort(): ?int
    {
        return 2;
    }

    protected function getData(): array
    {
        $data = CalonPeserta::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Fill missing months with 0
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = $data[$i] ?? 0;
        }

        $labels = array_map(function ($bulan) {
            return date('M', mktime(0, 0, 0, $bulan, 1));
        }, array_keys($months));

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => array_values($months),
                    'borderColor' => '#6F8FF9',
                    'backgroundColor' => 'rgba(111, 143, 249, 0.2)',
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
