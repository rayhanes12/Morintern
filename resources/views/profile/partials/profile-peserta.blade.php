@if (session('success'))
    <div class="max-w-4xl mx-auto mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-md">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="max-w-4xl mx-auto mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
        {{ session('error') }}
    </div>
@endif


{{-- FORM PROFIL PESERTA (KETUA + ANGGOTA) --}}

<section id="profile-peserta" class="max-w-4xl mx-auto pt-12 pb-24 px-6 space-y-10">

    {{-- Header Section --}}
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Profil Pemagang
        </h3>
        <button id="btnTambahAnggota" type="button"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold">
            + Tambah Anggota
        </button>
    </div>

    {{-- Form Ketua --}}
    <form id="formProfile" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Data Ketua --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $ketua->nama_lengkap ?? '') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">No Telepon</label>
                <input type="text" name="no_telp" value="{{ old('no_telp', $ketua->no_telp ?? '') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $ketua->email ?? '') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Spesialisasi</label>
                <select name="spesialisasi_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Spesialisasi</option>
                    <option value="1" {{ $ketua->spesialisasi_id == 1 ? 'selected' : '' }}>Back End</option>
                    <option value="2" {{ $ketua->spesialisasi_id == 2 ? 'selected' : '' }}>Front End</option>
                    <option value="3" {{ $ketua->spesialisasi_id == 3 ? 'selected' : '' }}>System Analyst</option>
                    <option value="4" {{ $ketua->spesialisasi_id == 4 ? 'selected' : '' }}>Quality Assurance</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Tanggal Magang</label>
                <div class="flex items-center space-x-2">
                    <input type="date" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $ketua->tanggal_mulai ?? '') }}"
                        class="w-1/2 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <span>-</span>
                    <input type="date" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $ketua->tanggal_selesai ?? '') }}"
                        class="w-1/2 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- File Upload --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Upload CV (.zip)</label>
                <input type="file" name="cv" accept=".zip"
                    class="w-full text-sm text-gray-700 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Upload Surat Lamaran (.jpg, .jpeg, .png)</label>
                <input type="file" name="surat" accept=".jpg,.jpeg,.png"
                    class="w-full text-sm text-gray-700 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        {{-- ========= Daftar Anggota ============ --}}
        <div class="mt-10">
            <h4 class="text-lg font-semibold mb-3 text-gray-800 dark:text-gray-100">Daftar Anggota</h4>
            <div id="anggotaContainer" class="space-y-4">
                {{-- Render anggota dari controller --}}
                @if(isset($anggota) && $anggota->count() > 0)
                    @foreach ($anggota as $a)
                        <div class="bg-white dark:bg-gray-700 border rounded-lg shadow p-4 flex justify-between items-center anggota-item"
                            data-id="{{ $a->id }}">
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $a->nama_lengkap }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $a->email ?? '-' }} | {{ $a->no_telp ?? '-' }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Spesialisasi:
                                    <strong>
                                        @if ($a->spesialisasi_id == 1)
                                            Back End
                                        @elseif ($a->spesialisasi_id == 2)
                                            Front End
                                        @elseif ($a->spesialisasi_id == 3)
                                            System Analyst
                                        @elseif ($a->spesialisasi_id == 4)
                                            Quality Assurance
                                        @else
                                            -
                                        @endif
                                    </strong>
                                </p>
                            </div>
                            <div class="space-x-2">
                                <button type="button"
                                    class="btnHapusAnggota bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                    data-id="{{ $a->id }}">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada anggota.</p>
                @endif
            </div>
        </div>

        {{-- Container for dynamically added anggota forms --}}
        <div id="dynamicAnggotaContainer" class="space-y-4"></div>

        {{-- Tombol Simpan --}}
        <div class="flex justify-end">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-semibold">
                Simpan Semua
            </button>
        </div>
    </form>
    

    {{-- Template Anggota Baru --}}
    <template id="anggotaTemplate">
        <div class="bg-gray-50 dark:bg-gray-900 border border-dashed rounded-lg p-4 anggota-form">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="anggota[__INDEX__][nama_lengkap]" 
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg" 
                        required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">No Telepon</label>
                    <input type="text" name="anggota[__INDEX__][no_telp]" 
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Email</label>
                    <input type="email" name="anggota[__INDEX__][email]" 
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Spesialisasi</label>
                    <select name="anggota[__INDEX__][spesialisasi_id]" 
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 rounded-lg">
                        <option value="">Pilih Spesialisasi</option>
                        <option value="1">Back End</option>
                        <option value="2">Front End</option>
                        <option value="3">System Analyst</option>
                        <option value="4">Quality Assurance</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-3">
                <button type="button"
                    class="btnHapusFormAnggota bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                    Hapus Form
                </button>
            </div>
        </div>
    </template>
</section>

{{-- JS Handler --}}
@push('scripts')
    @include('profile.partials.profile-peserta-js')
@endpush
