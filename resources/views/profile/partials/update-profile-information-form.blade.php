<section>
    <header class="mb-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informasi Profil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Perbarui data diri kamu yang tersimpan di sistem Morintern.
        </p>
    </header>

    <form id="profileForm" method="POST" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Nama Lengkap --}}
            <div>
                <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full"
                    :value="old('nama_lengkap', $user->nama_lengkap ?? '')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
            </div>

            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                    :value="old('email', $user->email ?? '')" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            {{-- No Telepon --}}
            <div>
                <x-input-label for="no_telp" :value="__('No Telepon')" />
                <x-text-input id="no_telp" name="no_telp" type="text" class="mt-1 block w-full"
                    :value="old('no_telp', $user->no_telp ?? '')" required />
                <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
            </div>

            {{-- Spesialisasi --}}
            <div>
                <x-input-label for="spesialisasi_id" :value="__('Spesialisasi')" />
                <select id="spesialisasi_id" name="spesialisasi_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">-- Pilih Spesialisasi --</option>
                    <option value="1" @selected(old('spesialisasi_id', $user->spesialisasi_id ?? '') == 1)>Back End</option>
                    <option value="2" @selected(old('spesialisasi_id', $user->spesialisasi_id ?? '') == 2)>Front End</option>
                    <option value="3" @selected(old('spesialisasi_id', $user->spesialisasi_id ?? '') == 3)>System Analyst</option>
                    <option value="4" @selected(old('spesialisasi_id', $user->spesialisasi_id ?? '') == 4)>Quality Assurance</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('spesialisasi_id')" />
            </div>

            {{-- Github --}}
            <div>
                <x-input-label for="github" :value="__('Github')" />
                <x-text-input id="github" name="github" type="url" class="mt-1 block w-full"
                    :value="old('github', $user->github ?? '')" placeholder="https://github.com/username" />
                <x-input-error class="mt-2" :messages="$errors->get('github')" />
            </div>

            {{-- LinkedIn --}}
            <div>
                <x-input-label for="linkedin" :value="__('LinkedIn')" />
                <x-text-input id="linkedin" name="linkedin" type="url" class="mt-1 block w-full"
                    :value="old('linkedin', $user->linkedin ?? '')" placeholder="https://linkedin.com/in/username" />
                <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
            </div>

            {{-- Tanggal Mulai & Selesai --}}
            <div class="md:col-span-2">
                <x-input-label for="tanggal_mulai" :value="__('Periode Magang')" />
                <div class="flex items-center gap-3 mt-1">
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-md"
                        value="{{ old('tanggal_mulai', isset($user->tanggal_mulai) ? $user->tanggal_mulai->format('Y-m-d') : '') }}"
                        required />
                    <span class="text-gray-600 dark:text-gray-400">s/d</span>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-md"
                        value="{{ old('tanggal_selesai', isset($user->tanggal_selesai) ? $user->tanggal_selesai->format('Y-m-d') : '') }}"
                        required />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('tanggal_mulai')" />
                <x-input-error class="mt-2" :messages="$errors->get('tanggal_selesai')" />
            </div>
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 dark:text-green-400">
                    {{ __('Berhasil disimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>
