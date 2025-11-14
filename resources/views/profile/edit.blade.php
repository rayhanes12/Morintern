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
            <form id="formProfilKetua" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" 
                class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                @csrf

                {{-- Header --}}
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

                {{-- SECTION: Daftar Anggota --}}
                <div class="mt-10">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Daftar Anggota</h2>
                        <button id="btnTambahAnggota" type="button"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            + Tambah Anggota
                        </button>
                    </div>

                    <div id="anggotaContainer" class="space-y-4">
                        @foreach ($anggota as $i => $a)
                            <div class="border border-blue-300/50 rounded-lg p-4 relative anggota-item">
                                <input type="hidden" name="anggota[{{ $i }}][id]" value="{{ $a->id }}">
                                <input type="text" name="anggota[{{ $i }}][nama_lengkap]" value="{{ $a->nama_lengkap }}"
                                    placeholder="Nama Lengkap" class="border border-blue-300 rounded-md px-3 py-2 w-full mb-2">
                                <input type="email" name="anggota[{{ $i }}][email]" value="{{ $a->email }}"
                                    placeholder="Email" class="border border-blue-300 rounded-md px-3 py-2 w-full mb-2">
                                <input type="text" name="anggota[{{ $i }}][no_telp]" value="{{ $a->no_telp }}"
                                    placeholder="No Telepon" class="border border-blue-300 rounded-md px-3 py-2 w-full mb-2">
                                <select name="anggota[{{ $i }}][spesialisasi_id]"
                                    class="border border-blue-300 rounded-md px-3 py-2 w-full mb-2">
                                    <option value="">Pilih Spesialisasi</option>
                                    @foreach ($spesialisasiOptions as $id => $nama)
                                        <option value="{{ $id }}" {{ $a->spesialisasi_id == $id ? 'selected' : '' }}>
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btnHapusAnggota absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">
                                    Hapus
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <template id="anggotaTemplate">
                    <div class="border border-blue-300/50 rounded-lg p-4 relative anggota-item bg-white shadow-sm mt-3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input type="text" name="anggota[__INDEX__][nama_lengkap]" placeholder="Nama Lengkap" required
                                class="border border-blue-300 rounded-md px-3 py-2">
                            <input type="email" name="anggota[__INDEX__][email]" placeholder="Email" required
                                class="border border-blue-300 rounded-md px-3 py-2">
                            <input type="text" name="anggota[__INDEX__][no_telp]" placeholder="No Telepon" required
                                class="border border-blue-300 rounded-md px-3 py-2">
                            <select name="anggota[__INDEX__][spesialisasi_id]" required
                                class="border border-blue-300 rounded-md px-3 py-2">
                                <option value="">Pilih Spesialisasi</option>
                                @foreach ($spesialisasiOptions as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="hapusBaru absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">
                            Hapus
                        </button>
                    </div>
                </template>

                {{-- Tombol Simpan --}}
                <div class="flex justify-end pt-4 border-t mt-8">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Simpan Semua
                    </button>
                </div>
            </form>

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
        let index = {{ count($anggota) }};

        btnTambah.addEventListener("click", () => {
            let html = template.replace(/__INDEX__/g, index++);
            container.insertAdjacentHTML("beforeend", html);
        });

        container.addEventListener("click", (e) => {
            if (e.target.classList.contains("hapusBaru")) {
                e.target.closest(".anggota-item").remove();
            }
        });
    });
    </script>
    @endpush
</x-app-layout>
