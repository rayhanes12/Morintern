<x-app-layout>
    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <img src="{{ asset('assets/profile/gelombang-profile.svg') }}" 
            alt="background waves" 
            class="absolute top-0 right-0 w-[600px] opacity-60 rotate-180 md:rotate-0">
        <img src="{{ asset('assets/profile/gelombang-profile.svg') }}" 
            alt="background waves bottom" 
            class="absolute bottom-0 left-0 w-[600px] opacity-60 md:rotate-180">
    </div>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Admin/HRD') }}
        </h2>
    </x-slot>

    {{-- Konten --}}
    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- FORM PROFIL USER --}}
            <div class="p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    Profil Pengguna
                </h2>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Nama --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Nama <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ $user->name ?? '' }}" required
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ $user->email ?? '' }}" required
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Jabatan</label>
                            <input type="text" name="jabatan" value="{{ $user->jabatan ?? '' }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- No Telp --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                            <input type="text" name="no_telp" value="{{ $user->no_telp ?? '' }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Perusahaan --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Perusahaan</label>
                            <input type="text" name="perusahaan" value="{{ $user->perusahaan ?? '' }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Alamat --}}
                        <div class="col-span-2">
                            <label class="block text-gray-700 dark:text-gray-300">Alamat</label>
                            <textarea name="alamat" rows="4"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">{{ $user->alamat ?? '' }}</textarea>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="mt-6 text-right">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

            {{-- HAPUS AKUN --}}
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-red-300/50">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Hapus Akun</h3>
                <div class="max-w-xl">
                    @includeIf('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
