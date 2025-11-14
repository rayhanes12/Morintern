<x-filament-panels::page>
    <form wire:submit.prevent="save" class="space-y-6 max-w-2xl mx-auto">
        {{ $this->form }}
        <x-filament::button type="submit">
            Simpan Profil
        </x-filament::button>
    </form>
</x-filament-panels::page>
