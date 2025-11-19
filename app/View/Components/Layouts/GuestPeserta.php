<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestPeserta extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
    ) {}

    public function render(): View
    {
        return view('layouts.guest-peserta', [
            'title' => $this->title,
            'description' => $this->description,
        ]);
    }
}