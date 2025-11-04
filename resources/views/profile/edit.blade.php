<x-app-layout>
    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <img 
            src="{{ asset('assets/profile/gelombang-profile.svg') }}" 
            alt="background waves" 
            class="absolute top-0 right-0 w-[600px] opacity-60 rotate-180 md:rotate-0"
        >
        <img 
            src="{{ asset('assets/profile/gelombang-profile.svg') }}" 
            alt="background waves bottom" 
            class="absolute bottom-0 left-0 w-[600px] opacity-60 md:rotate-180"
        >
    </div>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Peserta Magang') }}
        </h2>
    </x-slot>

    {{-- Konten --}}
    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Informasi Profil --}}
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Data Diri
                </h3>
                <div class="max-w-xl">
                    @includeIf('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Password Update --}}
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Ganti Password
                </h3>
                <div class="max-w-xl">
                    @includeIf('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Daftar Anggota Kelompok --}}
            @if(isset($anggota) && count($anggota) > 0)
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        Anggota Kelompok
                    </h3>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($anggota as $a)
                            <li class="py-3 flex justify-between items-center">
                                <span class="text-gray-800 dark:text-gray-100">
                                    {{ $a->nama ?? 'Nama tidak tersedia' }}
                                </span>
                                <button class="text-red-500 hover:text-red-700">Hapus</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
