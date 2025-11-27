<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PostinganChart extends ChartWidget
{
    protected ?string $heading = 'Postingan Chart';

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
