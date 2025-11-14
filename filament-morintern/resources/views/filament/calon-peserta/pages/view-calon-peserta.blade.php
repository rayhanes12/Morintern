<x-filament::page>
    <x-filament::section>
        <dl class="grid grid-cols-2 gap-4">
            <dt>Nama</dt>
            <dd>{{ $record->nama_lengkap }}</dd>

            <dt>Universitas</dt>
            <dd>{{ $record->asal_universitas }}</dd>

            <dt>Spesialisasi</dt>
            <dd>{{ $record->spesialisasi }}</dd>

            <dt>Status</dt>
            <dd>{{ ucfirst($record->status) }}</dd>

            <dt>Tanggal Daftar</dt>
            <dd>{{ $record->created_at->format('d M Y') }}</dd>
        </dl>
    </x-filament::section>
</x-filament::page>
