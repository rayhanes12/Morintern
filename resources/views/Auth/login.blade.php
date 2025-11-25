<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center justify-end mt-4 space-y-3">
            {{-- Tombol Login --}}
            <x-primary-button class="ms-3">
                {{ __('Masuk') }}
            </x-primary-button>

            {{-- Link Lupa Password --}}
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
            @endif


            {{-- Link Register --}}
            @if (Route::has('register'))
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Belum punya akun?') }}
                    <a href="{{ route('peserta.register') }}"
                    class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                        {{ __('Daftar Sekarang') }}
                    </a>
                </p>
            @endif
        </div>
    </form>

    <!-- Garis pemisah -->
    <div class="my-6 border-t border-gray-300 dark:border-gray-700"></div>

    <!-- Login dengan Google -->
    {{-- <div class="flex justify-center">
        <a href="{{ route('google.login') }}"
        class="flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                alt="Google Logo"
                class="w-5 h-5 mr-2">
            <span class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                Masuk dengan Google
            </span>
        </a>
    </div> --}}
</x-guest-layout>
