<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Inforamsi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @if($user instanceof \App\Models\Peserta)
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->nama_lengkap)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
            </div>

            <div>
                <x-input-label for="no_telp" :value="__('No Telp')" />
                <x-text-input id="no_telp" name="no_telp" type="text" class="mt-1 block w-full" :value="old('no_telp', $user->no_telp)" autocomplete="tel" />
                <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
            </div>

            @if($user->universitas)
            <div>
                <x-input-label for="universitas" :value="__('Universitas')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->universitas }}</p>
            </div>
            @endif

            @if($user->jurusan)
            <div>
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->jurusan }}</p>
            </div>
            @endif

            @if($user->spesialis)
            <div>
                <x-input-label for="spesialis" :value="__('Spesialis')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->spesialis }}</p>
            </div>
            @endif

            @if($user->github)
            <div>
                <x-input-label for="github" :value="__('Github')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->github }}</p>
            </div>
            @endif

            @if($user->linkedin)
            <div>
                <x-input-label for="linkedin" :value="__('LinkedIn')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->linkedin }}</p>
            </div>
            @endif

            @if($user->tanggal_mulai)
            <div>
                <x-input-label for="tanggal_mulai" :value="__('Tanggal Mulai')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->tanggal_mulai->format('d/m/Y') }}</p>
            </div>
            @endif

            @if($user->tanggal_selesai)
            <div>
                <x-input-label for="tanggal_selesai" :value="__('Tanggal Selesai')" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $user->tanggal_selesai->format('d/m/Y') }}</p>
            </div>
            @endif
        @else
            
        {{-- USER/ADMIN/HRD --}}
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        @endif

        {{-- Foto --}}
            {{-- <div class="mt-4">
                <x-input-label for="foto" :value="__('Foto Profil')" />
                <input id="foto" name="foto" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
                <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                @if ($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="mt-2 w-24 h-24 rounded-full object-cover">
                @endif
            </div> --}}

            {{-- Jabatan --}}
            {{-- <div class="mt-4">
                <x-input-label for="jabatan" :value="__('Jabatan')" />
                <x-text-input id="jabatan" name="jabatan" type="text" class="mt-1 block w-full"
                    :value="old('jabatan', $user->jabatan)" autocomplete="organization-title" />
                <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
            </div> --}}

            {{-- Nomor Telepon --}}
            {{-- <div class="mt-4">
                <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
                <x-text-input id="no_telp" name="no_telp" type="text" class="mt-1 block w-full"
                    :value="old('no_telp', $user->no_telp)" autocomplete="tel" />
                <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
            </div> --}}

            {{-- Alamat --}}
            {{-- <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat', $user->alamat) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
            </div> --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
