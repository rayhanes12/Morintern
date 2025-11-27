<?php

namespace App\Filament\Widgets;

use App\Models\PesertaCalon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Calon Peserta', PesertaCalon::count())
                ->description('Semua pendaftar')
                ->color('primary'),
            Stat::make('Pendaftar', PesertaCalon::where('status', 'pendaftar')->count())
                ->description('Belum diseleksi')
                ->color('warning'),
            Stat::make('Diterima', PesertaCalon::where('status', 'diterima')->count())
                ->description('Sudah promosi')
                ->color('success'),
            Stat::make('Ditolak', PesertaCalon::where('status', 'ditolak')->count())
                ->description('Tidak lolos')
                ->color('danger'),
        ];
    }
}