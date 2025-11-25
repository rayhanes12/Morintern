<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen w-full flex items-center justify-center bg-[#6F8FF9] font-['Plus_Jakarta_Sans'] px-6">
        {{-- Brand Text --}}
        <div class="absolute top-8 left-8">
            <a href="{{ url('/') }}" class="text-2xl font-bold tracking-tight">
                <span class="text-white">Mor</span><span class="text-[#6F8FF9] bg-white px-1 rounded">Intern</span>
            </a>
        </div>

        {{-- Main Container --}}
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            {{-- Left: Illustration --}}
            <div class="flex justify-center items-center">
                <img src="{{ asset('assets/landing/illustrasi-login.png') }}" 
                    alt="Login Illustration"
                    class="max-w-[450px] h-auto">
            </div>

            {{-- Right: Form Card --}}
            <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">
                {{-- Header --}}
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Masuk ke Akun Anda</h1>
                    <p class="text-gray-500 text-sm">
                        Silakan masukkan kredensial Anda untuk melanjutkan
                    </p>
                </div>

                {{-- Form Login --}}
                <form method="POST" action="{{ route('peserta.login') }}" class="space-y-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="mail" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required 
                                autofocus 
                                autocomplete="username"
                                placeholder="contoh@email.com"
                                class="w-full h-12 pl-10 pr-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="lock" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input id="password" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                placeholder="Masukkan password"
                                class="w-full h-12 pl-10 pr-12 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                            <button type="button" 
                                    id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i data-feather="eye" id="eyeIcon" class="w-5 h-5 text-gray-400 hover:text-gray-600 transition"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center">
                        <input id="remember_me" 
                            type="checkbox" 
                            name="remember" 
                            class="h-4 w-4 text-[#6F8FF9] focus:ring-[#6F8FF9] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full h-12 bg-[#6F8FF9] hover:bg-[#5D7CE0] text-white font-medium rounded-lg transition-colors duration-200">
                            Masuk
                        </button>
                    </div>

                    {{-- Links --}}
                    <div class="space-y-2 pt-2">
                        <div class="text-center">
                            <a href="{{ route('peserta.register') }}"
                            class="text-sm text-gray-600 hover:text-[#6F8FF9] transition-colors">
                                Belum Punya Akun? <span class="font-semibold">Daftar Disini</span>
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('peserta.password.request') }}"
                            class="text-sm text-gray-500 hover:text-[#6F8FF9] transition-colors">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- Toggle Password Visibility Script --}}
    <script>
        // Initialize Feather Icons
        feather.replace();

        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the icon
            const iconName = type === 'password' ? 'eye' : 'eye-off';
            eyeIcon.setAttribute('data-feather', iconName);
            feather.replace();
        });
    </script>
</body>
</html>