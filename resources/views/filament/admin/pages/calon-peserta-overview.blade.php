<x-filament::page>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="space-y-4">
            <x-filament::card>
                <h3 class="text-lg font-semibold">Pendaftar (Pending)</h3>
                {{-- widget will render its content here --}}
                @livewire(\App\Filament\Admin\Widgets\PendingCalonPeserta::class)
            </x-filament::card>
        </div>

        <div class="space-y-4">
            <x-filament::card>
                <h3 class="text-lg font-semibold">Status (Diterima / Ditolak)</h3>
                @livewire(\App\Filament\Admin\Widgets\StatusCalonPeserta::class)
            </x-filament::card>
        </div>
    </div>
</x-filament::page>
