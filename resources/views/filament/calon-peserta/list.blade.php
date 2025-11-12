<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Calon Peserta</h2>

    {{-- Tabel Pendaftar --}}
    <div class="mb-6">
        <h3 class="font-semibold text-lg mb-2">Pendaftar</h3>
        @livewire(\App\Filament\Resources\CalonPesertaResource\Pages\ListCalonPesertas::class, ['statusFilter' => 'Pendaftar'])
    </div>

    {{-- Tabel Diterima --}}
    <div class="mb-6">
        <h3 class="font-semibold text-lg mb-2">Diterima</h3>
        @livewire(\App\Filament\Resources\CalonPesertaResource\Pages\ListCalonPesertas::class, ['statusFilter' => 'Diterima'])
    </div>

    {{-- Tabel Ditolak --}}
    <div class="mb-6">
        <h3 class="font-semibold text-lg mb-2">Ditolak</h3>
        @livewire(\App\Filament\Resources\CalonPesertaResource\Pages\ListCalonPesertas::class, ['statusFilter' => 'Ditolak'])
    </div>
</x-filament::page>
