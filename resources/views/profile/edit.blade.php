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

            {{-- FORM PROFIL KETUA + ANGGOTA --}}
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8505740faaf285846d2049422350b454e8e834f9
            @php
                $isPeserta = Auth::guard('peserta')->check();
                $formAction = $isPeserta ? route('peserta.profil.update') : route('profile.update');
                $anggotaBase = $isPeserta ? url('/peserta/profil') : url('/profile');
            @endphp
            <form id="formProfilKetua" method="POST" action="{{ $formAction }}" enctype="multipart/form-data" 
<<<<<<< HEAD
=======
=======
            <form id="formProfilKetua" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" 
>>>>>>> main
>>>>>>> 8505740faaf285846d2049422350b454e8e834f9
                class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                @csrf

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">Profil Magang</h2>
                    <button id="btnPenilaian" type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
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
                    <input type="text" name="universitas_id" value="{{ old('universitas_id', $user->universitas_id ?? '') }}"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Jurusan --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Jurusan</label>
                    <input type="text" name="jurusan_id" value="{{ old('jurusan_id', $user->jurusan_id ?? '') }}"
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
                        <input type="file" name="cv" accept=".zip"
                            class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
                        @if($user->cv ?? false)
                            <p class="text-sm text-gray-500 mt-1">File saat ini: {{ basename($user->cv) }}</p>
                        @endif
                    </div>
                </div>

                {{-- Surat Lamaran --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Surat Lamaran</label>
                    <div class="col-span-2">
                        <input type="file" name="surat" accept=".jpg,.jpeg,.png"
                            class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
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

                {{-- Tombol Simpan --}}
                <div class="flex justify-end pt-4 border-t mt-8">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Simpan 
                    </button>
                </div>


                    <div id="anggotaContainer" class="space-y-4">
                        @foreach ($anggota as $i => $a)
                            <div class="border border-blue-300/50 rounded-lg p-6 anggota-item bg-white shadow-sm relative">

                                <!-- Nama Lengkap -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" name="anggota[{{ $i }}][nama_lengkap]" 
                                        value="{{ $a->nama_lengkap }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Email</label>
                                    <input type="email" name="anggota[{{ $i }}][email]" 
                                        value="{{ $a->email }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- No Telepon -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">No Telepon</label>
                                        <input type="text" name="anggota[{{ $i }}][no_telp]"
                                        value="{{ $a->no_telp }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Spesialisasi -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Spesialisasi Magang</label>
                                    <select name="anggota[{{ $i }}][spesialisasi_id]"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                        <option value="">Pilih Spesialisasi</option>
                                        @foreach ($spesialisasiOptions as $id => $nama)
                                            <option value="{{ $id }}" {{ $a->spesialisasi_id == $id ? 'selected' : '' }}>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- GitHub -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">GitHub</label>
                                    <input type="text" name="anggota[{{ $i }}][github]" 
                                        value="{{ $a->github }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- LinkedIn -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 mb-1">LinkedIn</label>
                                    <input type="text" name="anggota[{{ $i }}][linkedin]"
                                        value="{{ $a->linkedin }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Hidden ID -->
                                <input type="hidden" name="anggota[{{ $i }}][id]" value="{{ $a->id }}">

                                <!-- Tombol Hapus -->
                                <button type="button"
                                    class="btnHapusAnggota absolute top-3 right-3 text-red-600 hover:text-red-800 text-sm">
                                    Hapus
                                </button>

                            </div>
                        @endforeach
                    </div>


        <template id="anggotaTemplate">
            <div class="border border-blue-300/50 rounded-lg p-6 anggota-item bg-white shadow-sm relative">

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="anggota[__INDEX__][nama_lengkap]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Email</label>
                    <input type="email" name="anggota[__INDEX__][email]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

<<<<<<< HEAD
                <!-- No Telepon -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">No Telepon</label>
                    <input type="text" name="anggota[__INDEX__][no_telp]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

=======
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

                {{-- Nama Lengkap --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap ?? '') }}"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Asal Univ --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Asal Univ</label>
                    <input type="text" name="universitas_id" value="{{ old('universitas_id', $user->universitas_id ?? '') }}"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                {{-- Jurusan --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Jurusan</label>
                    <input type="text" name="jurusan_id" value="{{ old('jurusan_id', $user->jurusan_id ?? '') }}"
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
                        <input type="file" name="cv" accept=".zip"
                            class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
                        @if($user->cv ?? false)
                            <p class="text-sm text-gray-500 mt-1">File saat ini: {{ basename($user->cv) }}</p>
                        @endif
                    </div>
                </div>

                {{-- Surat Lamaran --}}
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Surat Lamaran</label>
                    <div class="col-span-2">
                        <input type="file" name="surat" accept=".jpg,.jpeg,.png"
                            class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
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

                {{-- Tombol Simpan --}}
                <div class="flex justify-end pt-4 border-t mt-8">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Simpan 
                    </button>
                </div>


                    <div id="anggotaContainer" class="space-y-4">
                        @foreach ($anggota as $i => $a)
                            <div class="border border-blue-300/50 rounded-lg p-6 anggota-item bg-white shadow-sm relative">

                                <!-- Nama Lengkap -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" name="anggota[{{ $i }}][nama_lengkap]" 
                                        value="{{ $a->nama_lengkap }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Email</label>
                                    <input type="email" name="anggota[{{ $i }}][email]" 
                                        value="{{ $a->email }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- No Telepon -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">No Telepon</label>
                                    <input type="text" name="anggota[{{ $i }}][no_telp }}"
                                        value="{{ $a->no_telp }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Spesialisasi -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Spesialisasi Magang</label>
                                    <select name="anggota[{{ $i }}][spesialisasi_id]"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                        <option value="">Pilih Spesialisasi</option>
                                        @foreach ($spesialisasiOptions as $id => $nama)
                                            <option value="{{ $id }}" {{ $a->spesialisasi_id == $id ? 'selected' : '' }}>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- GitHub -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">GitHub</label>
                                    <input type="text" name="anggota[{{ $i }}][github]" 
                                        value="{{ $a->github }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- LinkedIn -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 mb-1">LinkedIn</label>
                                    <input type="text" name="anggota[{{ $i }}][linkedin }}" 
                                        value="{{ $a->linkedin }}"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Hidden ID -->
                                <input type="hidden" name="anggota[{{ $i }}][id]" value="{{ $a->id }}">

                                <!-- Tombol Hapus -->
                                <button type="button"
                                    class="btnHapusAnggota absolute top-3 right-3 text-red-600 hover:text-red-800 text-sm">
                                    Hapus
                                </button>

                            </div>
                        @endforeach
                    </div>


        <template id="anggotaTemplate">
            <div class="border border-blue-300/50 rounded-lg p-6 anggota-item bg-white shadow-sm relative">

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="anggota[__INDEX__][nama_lengkap]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Email</label>
                    <input type="email" name="anggota[__INDEX__][email]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

                <!-- No Telepon -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">No Telepon</label>
                    <input type="text" name="anggota[__INDEX__][no_telp]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                </div>

>>>>>>> 8505740faaf285846d2049422350b454e8e834f9
                <!-- Spesialisasi -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Spesialisasi Magang</label>
                    <select name="anggota[__INDEX__][spesialisasi_id]"
                        class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                        <option value="">Pilih Spesialisasi</option>
                        @foreach ($spesialisasiOptions as $id => $nama)
                            <option value="{{ $id }}">{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>

        <!-- Github -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">GitHub</label>
            <input type="text" name="anggota[__INDEX__][github]"
                placeholder="https://github.com/username"
                class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- LinkedIn -->
        <div class="mb-6">
            <label class="block text-gray-700 mb-1">LinkedIn</label>
            <input type="text" name="anggota[__INDEX__][linkedin]"
                placeholder="https://linkedin.com/in/username"
                class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- tombol hapus -->
        <button type="button"
            class="btnHapusAnggota absolute top-3 right-3 text-red-600 hover:text-red-800 text-sm">
            Hapus
        </button>

    </div>
</template>

<<<<<<< HEAD

            </form>

    <!-- Penilaian Modal -->
    <div id="penilaianModal" class="hidden fixed inset-0 z-50 flex items-center justify-center" role="dialog" aria-modal="true" aria-labelledby="penilaianTitle">
        <div class="absolute inset-0 bg-black/50" id="penilaianOverlay" aria-hidden="true"></div>
        <div class="relative bg-white rounded-lg shadow-lg w-11/12 max-w-3xl p-6 z-10" tabindex="-1">
            <div class="flex items-start justify-between mb-4">
                <h3 id="penilaianTitle" class="text-lg font-semibold">Penilaian Magang</h3>
                <button id="btnClosePenilaian" class="text-gray-500 hover:text-gray-800">Tutup</button>
            </div>
            <div id="penilaianContent" class="space-y-4 max-h-[60vh] overflow-auto">
                <p class="text-sm text-gray-500">Memuat data penilaian...</p>
            </div>
        </div>
    </div>
=======

            </form>
>>>>>>> 8505740faaf285846d2049422350b454e8e834f9

            {{-- SECTION: Daftar Anggota --}}
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200 mt-10">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Daftar Anggota</h2>
                        <button id="btnTambahAnggota" type="button"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            + Tambah Anggota
                        </button>
                    </div>

            {{-- SECTION: Hapus Akun --}}
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Hapus Akun</h3>
                <div class="border-t border-gray-200 pt-4">
                    @includeIf('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    {{-- SCRIPT TAMBAH / HAPUS ANGGOTA --}}
    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
        const btnTambah = document.getElementById("btnTambahAnggota");
        const container = document.getElementById("anggotaContainer");
        const template = document.getElementById("anggotaTemplate").innerHTML;
        const anggotaBase = "{{ $anggotaBase }}";
        let index = {{ count($anggota) }};

        btnTambah.addEventListener("click", () => {
            let html = template.replace(/__INDEX__/g, index++);
            container.insertAdjacentHTML("beforeend", html);
        });

        // Penilaian popup handling
        const btnPenilaian = document.getElementById('btnPenilaian');
        const penilaianModal = document.getElementById('penilaianModal');
        const penilaianOverlay = document.getElementById('penilaianOverlay');
        const btnClosePenilaian = document.getElementById('btnClosePenilaian');
        const penilaianContent = document.getElementById('penilaianContent');

        let _penilaianKeyHandler = null;
        function closePenilaian() {
            penilaianModal.classList.add('hidden');
            penilaianContent.innerHTML = '';
            document.body.classList.remove('overflow-hidden');
            if (typeof _penilaianKeyHandler === 'function') {
                document.removeEventListener('keydown', _penilaianKeyHandler);
                _penilaianKeyHandler = null;
            }
            // restore focus to the Penilaian button
            if (btnPenilaian) btnPenilaian.focus();
            if (btnPenilaian) btnPenilaian.disabled = false;
        }

        function renderFileHtml(fileUrl) {
            if (!fileUrl) return '';
            const ext = fileUrl.split('.').pop().toLowerCase();
            const imageExt = ['jpg','jpeg','png','gif','webp'];
            if (imageExt.includes(ext)) {
                return `<img src="${fileUrl}" alt="Hasil Penilaian" class="max-w-full max-h-96 rounded-md border"/>`;
            }
            // PDF or others -> provide link
            return `<a href="${fileUrl}" target="_blank" class="text-blue-600 underline">Lihat file penilaian</a>`;
        }

        if (btnPenilaian) {
            btnPenilaian.addEventListener('click', (e) => {
                e.preventDefault();
                btnPenilaian.disabled = true;
                penilaianContent.innerHTML = '<p class="text-sm text-gray-500">Memuat data penilaian...</p>';
                penilaianModal.classList.remove('hidden');
                // lock body scroll
                document.body.classList.add('overflow-hidden');
                // focus the modal container
                const modalContainer = penilaianModal.querySelector('[tabindex="-1"]');
                if (modalContainer) modalContainer.focus();

                // add key handler to close on Escape
                _penilaianKeyHandler = function (ev) {
                    if (ev.key === 'Escape' || ev.key === 'Esc') {
                        closePenilaian();
                    }
                };
                document.addEventListener('keydown', _penilaianKeyHandler);

                fetch(`${anggotaBase}/penilaian`, {
                    headers: { 'Accept': 'application/json' }
                })
                .then(r => r.json())
                .then(json => {
                    if (!json.success) {
                        penilaianContent.innerHTML = `<p class="text-sm text-red-500">${json.message || 'Gagal memuat penilaian.'}</p>`;
                        return;
                    }

                    const data = json.data || [];
                    if (data.length === 0) {
                        penilaianContent.innerHTML = '<p class="text-sm text-gray-600">Belum ada penilaian untuk Anda.</p>';
                        return;
                    }

                    // Render one or multiple penilaian entries
                    penilaianContent.innerHTML = data.map(d => {
                        return `
                        <div class="border p-4 rounded-md">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-sm text-gray-700 font-medium">${d.nama}</div>
                                <div class="text-sm text-gray-600">Nilai: <span class="font-semibold">${d.nilai_rata_rata ?? '-'}</span></div>
                            </div>
                            <div class="mb-2 text-sm text-gray-700">${d.masukan ? d.masukan : '<span class="text-gray-500">(Tidak ada masukan)</span>'}</div>
                            <div>${renderFileHtml(d.file_url)}</div>
                        </div>`;
                    }).join('<div class="h-2"></div>');
                })
                .catch(err => {
                    console.error(err);
                    penilaianContent.innerHTML = '<p class="text-sm text-red-500">Terjadi kesalahan saat memuat penilaian.</p>';
                })
                .finally(() => {
                    // Re-enable button (but keep modal open)
                    btnPenilaian.disabled = false;
                });
            });
        }

        if (btnClosePenilaian) btnClosePenilaian.addEventListener('click', closePenilaian);
        if (penilaianOverlay) penilaianOverlay.addEventListener('click', closePenilaian);

        container.addEventListener("click", (e) => {
            if (e.target.classList.contains("btnHapusAnggota")) {
                const item = e.target.closest('.anggota-item');
                const idInput = item.querySelector('input[name$="[id]"]');

                // If anggota has an ID, call server to delete; otherwise just remove from DOM
                if (idInput && idInput.value) {
                    const anggotaId = idInput.value;
                    if (!confirm('Hapus anggota ini?')) return;

<<<<<<< HEAD
                    fetch(`${anggotaBase}/anggota/${anggotaId}`, {
=======
                    fetch(`/profile/anggota/${anggotaId}`, {
>>>>>>> 8505740faaf285846d2049422350b454e8e834f9
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                    })
                    .then(r => r.json())
                    .then(json => {
                        if (json.success) {
                            item.remove();
                        } else {
                            alert(json.message || 'Gagal menghapus anggota.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan saat menghapus anggota.');
                    });
                } else {
                    item.remove();
                }
            }
        });
    });

    </script>
    @endpush
</x-app-layout>
