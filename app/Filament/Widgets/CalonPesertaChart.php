<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CalonPesertaChart extends ChartWidget
{
    protected ?string $heading = 'Calon Peserta Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
