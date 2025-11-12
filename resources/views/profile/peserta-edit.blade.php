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
            {{ __('Profil Peserta Magang') }}
        </h2>
    </x-slot>

    {{-- Konten --}}
    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- FORM PROFIL KETUA --}}
            <div class="p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    Profil Ketua
                </h2>

                <form id="formProfile" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Nama --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_lengkap" value="{{ $user->nama_lengkap ?? '' }}" required
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Universitas --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Asal Universitas <span class="text-red-500">*</span></label>
                            <input type="text" name="universitas" value="{{ $user->universitas ?? '' }}" required
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Jurusan --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Jurusan</label>
                            <input type="text" name="jurusan" value="{{ $user->jurusan ?? '' }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- No Telp --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                            <input type="text" name="no_telp" value="{{ $user->no_telp ?? '' }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" value="{{ $user->email ?? '' }}" readonly
                                class="w-full border rounded p-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-100 cursor-not-allowed">
                        </div>

                        {{-- Github --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Link Github <span class="text-red-500">*</span></label>
                            <input type="text" name="github" value="{{ $user->github ?? '' }}" required
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- LinkedIn --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Link LinkedIn</label>
                            <input type="text" name="linkedin" value="{{ $user->linkedin ?? '' }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        {{-- Spesialisasi --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Spesialisasi Magang <span class="text-red-500">*</span></label>
                            <select name="spesialisasi_id" required
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100 relative z-50">
                                <option value="">Pilih Spesialisasi</option>
                                @foreach ($spesialisasiOptions as $id => $label)
                                    <option value="{{ $id }}" {{ $user->spesialisasi_id == $id ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal Magang --}}
                        <div class="col-span-2 flex items-center gap-2">
                            <label class="block text-gray-700 dark:text-gray-300 w-1/2">Tanggal Magang <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_mulai" value="{{ $user->tanggal_mulai?->format('Y-m-d') }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100" required>
                            <span class="dark:text-gray-300">-</span>
                            <input type="date" name="tanggal_selesai" value="{{ $user->tanggal_selesai?->format('Y-m-d') }}"
                                class="w-full border rounded p-2 focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-gray-100" required>
                        </div>

                        {{-- CV --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Upload CV (.zip) <span class="text-red-500">*</span></label>
                            <input type="file" name="cv" accept=".zip" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-gray-100">
                            @if($user->cv)
                                <p class="text-sm text-gray-500 mt-1">File saat ini: {{ basename($user->cv) }}</p>
                            @endif
                        </div>

                        {{-- Surat --}}
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Surat Lamaran (.jpg/.jpeg/.png) <span class="text-red-500">*</span></label>
                            <input type="file" name="surat" accept=".jpg,.jpeg,.png" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-gray-100">
                            @if($user->surat)
                                <p class="text-sm text-gray-500 mt-1">File saat ini: {{ basename($user->surat) }}</p>
                            @endif
                        </div>
                    </div>

                    {{-- Notifikasi --}}
                    <div id="notifArea" class="hidden mt-4 p-3 rounded text-white text-sm"></div>

                    {{-- Submit --}}
                    <div class="mt-6 text-right">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

            {{-- SECTION ANGGOTA --}}
            <div class="p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800 mt-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Anggota</h2>
                    <button id="btnTambahAnggota"
                        class="border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white font-semibold px-4 py-2 rounded-lg transition">
                        + Tambah Anggota
                    </button>
                </div>

                <div id="anggotaContainer" class="space-y-4">
                    @foreach ($anggota as $a)
                        <div class="p-4 border rounded-md relative">
                            <p class="font-semibold dark:text-gray-100">{{ $a->nama_lengkap }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $a->email }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Spesialisasi: {{ $spesialisasiOptions[$a->spesialisasi_id] ?? '-' }}
                            </p>
                            <button type="button" data-id="{{ $a->id }}"
                                class="btnHapusAnggota absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">
                                Hapus
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Template anggota dinamis --}}
                <template id="anggotaTemplate">
                    <div class="p-4 border rounded-md relative anggotaItem">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input type="text" name="anggota[__INDEX__][nama_lengkap]" placeholder="Nama Lengkap" required
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100">
                            <input type="text" name="anggota[__INDEX__][no_telp]" placeholder="No. Telepon" required
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100">
                            <input type="email" name="anggota[__INDEX__][email]" placeholder="Email" required
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100">
                            <input type="text" name="anggota[__INDEX__][github]" placeholder="Link Github"
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100">
                            <input type="text" name="anggota[__INDEX__][linkedin]" placeholder="Link LinkedIn"
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100">
                            <select name="anggota[__INDEX__][spesialisasi_id]" required
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100 relative z-50">
                                <option value="">Pilih Spesialisasi</option>
                                @foreach ($spesialisasiOptions as $id => $label)
                                    <option value="{{ $id }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="hapusBaru absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">
                            Hapus
                        </button>
                    </div>
                </template>
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

    @push('scripts')
        @include('profile.partials.profile-peserta-js')
    @endpush
</x-app-layout>
