<x-app-layout>
    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden w-full h-full">
        <img 
            src="{{ asset('assets/profile/gelombang-profile.svg') }}" 
            alt="background waves" 
            class="absolute top-0 right-0 w-[600px] opacity-60 rotate-180 md:rotate-0 object-cover"
        >
        <img 
            src="{{ asset('assets/profile/gelombang-profile.svg') }}" 
            alt="background waves bottom" 
            class="absolute bottom-0 left-0 w-[600px] opacity-60 md:rotate-180 object-cover"
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- FORM PROFIL KETUA --}}
            <form id="formProfilKetua" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                @csrf

                {{-- Header dengan Tombol Penilaian --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">Profil Magang</h2>
                    <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Penilaian
                    </button>
                </div>

                {{-- Nama Lengkap --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap ?? '') }}"
                           class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Asal Univ --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Asal Univ</label>
                    <input type="text" name="universitas" value="{{ old('universitas', $user->universitas_id ?? '') }}"
                           class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Jurusan --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Jurusan</label>
                    <input type="text" name="jurusan" value="{{ old('jurusan', $user->jurusan_id ?? '') }}"
                           class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- No Telepon --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">No Telepon</label>
                    <input type="text" name="no_telp" value="{{ old('no_telp', $user->no_telp ?? '') }}"
                           class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Email --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Email</label>
                    <input type="email" disabled value="{{ $user->email ?? '' }}"
                           class="col-span-2 bg-gray-100 border border-gray-300 rounded-md px-3 py-2 cursor-not-allowed">
                </div>

                {{-- Link Github --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Link Github</label>
                    <input type="text" name="github" value="{{ old('github', $user->github ?? '') }}"
                           class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- LinkedIn --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{ old('linkedin', $user->linkedin ?? '') }}"
                           class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Tanggal Mulai & Selesai --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Tanggal Mulai &<br>Tanggal Selesai</label>
                    <div class="col-span-2 flex items-center gap-2">
                        <input type="date" name="tanggal_mulai" class="border border-blue-300 rounded-md px-3 py-2 flex-1"
                               value="{{ old('tanggal_mulai', $user->tanggal_mulai?->format('Y-m-d')) }}">
                        <span class="text-gray-600">s/d</span>
                        <input type="date" name="tanggal_selesai" class="border border-blue-300 rounded-md px-3 py-2 flex-1"
                               value="{{ old('tanggal_selesai', $user->tanggal_selesai?->format('Y-m-d')) }}">
                    </div>
                </div>

                {{-- CV --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">CV</label>
                    <div class="col-span-2">
                        <input type="file" name="cv" accept=".zip" class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
                        @if($user->cv ?? false)
                            <p class="text-sm text-gray-500 mt-1">File saat ini: {{ basename($user->cv) }}</p>
                        @endif
                    </div>
                </div>

                {{-- Surat Lamaran --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Surat Lamaran</label>
                    <div class="col-span-2">
                        <input type="file" name="surat" accept=".jpg,.jpeg,.png" class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
                        @if($user->surat ?? false)
                            <p class="text-sm text-gray-500 mt-1">File saat ini: {{ basename($user->surat) }}</p>
                        @endif
                    </div>
                </div>

                {{-- Spesialisasi --}}
                <div class="mb-6 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Spesialisasi Magang</label>
                    <select name="spesialisasi_id" class="col-span-2 border border-blue-300 rounded-md px-3 py-2">
                        <option value="">-Silahkan Pilih-</option>
                        @foreach($spesialisasiOptions as $id => $nama)
                            <option value="{{ $id }}" {{ ($user->spesialisasi_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-between pt-4 border-t">
                    <button type="button" id="btnTambahAnggota" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Tambah Anggota
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>

            {{-- SECTION ANGGOTA --}}
            <div class="p-6 bg-white shadow sm:rounded-lg dark:bg-gray-800 mt-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                        Daftar Anggota
                    </h2>
                    <button id="btnTambahAnggota"
                        class="bg-[#6F8FF9] hover:bg-[#5C78D6] text-white px-4 py-2 rounded-lg font-semibold transition">
                        + Tambah Anggota
                    </button>
                </div>

                <div id="anggotaContainer" class="space-y-4">
                    {{-- Daftar anggota dari backend --}}
                    @foreach ($anggota as $a)
                        <div class="bg-white border border-[#6F8FF9]/40 shadow-sm rounded-xl p-5 relative">
                            <p class="font-semibold dark:text-gray-100">{{ $a->nama_lengkap }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $a->email }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Spesialisasi: {{ $spesialisasiOptions[$a->spesialisasi_id] ?? '-' }}</p>
                            <button type="button" data-id="{{ $a->id }}"
                                class="btnHapusAnggota absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">
                                Hapus
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Template anggota dinamis --}}
                <template id="anggotaTemplate">
                    <div class="bg-white border border-[#6F8FF9]/50 rounded-xl p-5 shadow-sm relative anggotaItem">
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
                                class="border rounded p-2 w-full dark:bg-gray-700 dark:text-gray-100">
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

        </div>
    </div>

    {{-- Hapus Akun --}}
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg border border-red-300/50">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Hapus Akun
                </h3>
                <div class="max-w-xl">
                    @includeIf('profile.partials.delete-user-form')
                </div>
            </div>

    @push('scripts')
        @include('profile.partials.profile-peserta-js')
    @endpush
</x-app-layout>
