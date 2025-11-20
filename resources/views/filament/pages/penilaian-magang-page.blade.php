<x-filament-panels::page>
    <div class="space-y-8">

        {{-- FORM --}}
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm">
            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                Tambah Penilaian Magang
            </h2>

            <form wire:submit.prevent="save" class="space-y-4">
                {{ $this->form }}
                <x-filament::button type="submit" class="mt-4">
                    Simpan Penilaian
                </x-filament::button>
            </form>
        </div>

        {{-- TABLE --}}
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm">
            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                Daftar Penilaian Peserta Magang
            </h2>

            {{ $this->table }}
        </div>

    </div>
</x-filament-panels::page>
