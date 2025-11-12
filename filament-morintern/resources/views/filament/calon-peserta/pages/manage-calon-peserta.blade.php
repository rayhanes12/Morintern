<x-filament::page>
    <div class="space-y-8">
        <div>
            <h2 class="text-xl font-bold">Calon Peserta</h2>
            <p class="text-gray-500">Berikut daftar seluruh calon peserta magang berdasarkan statusnya.</p>
        </div>

        <div>
            <x-filament::section heading="Tabel Pendaftar">
                <livewire:app.filament.resources.calon-peserta-resource.widgets.pendaftar-table />
            </x-filament::section>

            <x-filament::section heading="Tabel Diterima">
                <livewire:app.filament.resources.calon-peserta-resource.widgets.diterima-table />
            </x-filament::section>

            <x-filament::section heading="Tabel Ditolak">
                <livewire:app.filament.resources.calon-peserta-resource.widgets.ditolak-table />
            </x-filament::section>
        </div>
    </div>
</x-filament::page>
