<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Daftar</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

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
        {{-- Brand / Logo --}}
        <div class="absolute top-8 left-8">
            <a href="{{ url('/') }}" class="text-white text-2xl font-bold tracking-wide">
                MorIntern
            </a>
        </div>

        {{-- Main Container --}}
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            {{-- Left: Illustration --}}
            <div class="flex justify-center">
                <img src="{{ asset('assets/landing/ilustrasi-register.svg') }}" 
                     alt="Register Illustration"
                     class="max-w-[450px] h-auto">
            </div>

            {{-- Right: Form Card --}}
            <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">
                {{-- Header --}}
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Daftar Sebagai Peserta</h1>
                    <p class="text-gray-500 text-sm">
                        Silakan isi data di bawah untuk membuat akun Anda
                    </p>
                </div>

                {{-- Form Register --}}
                <form method="POST" action="{{ route('peserta.register') }}" class="space-y-4">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div>
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Lengkap
                        </label>
                        <input id="nama_lengkap" 
                               type="text" 
                               name="nama_lengkap" 
                               value="{{ old('nama_lengkap') }}"
                               required 
                               autofocus 
                               autocomplete="name"
                               placeholder="Masukkan nama lengkap"
                               class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('nama_lengkap')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Alamat Email
                        </label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required 
                               autocomplete="username"
                               placeholder="contoh@email.com"
                               class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- No Telepon --}}
                    <div>
                        <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">
                            Nomor Telepon
                        </label>
                        <input id="no_telp" 
                               type="text" 
                               name="no_telp" 
                               value="{{ old('no_telp') }}"
                               required
                               placeholder="08xxxxxxxxxx"
                               class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('no_telp')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="new-password"
                               placeholder="Masukkan password"
                               class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Konfirmasi Password
                        </label>
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               placeholder="Konfirmasi password"
                               class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full h-12 bg-[#6F8FF9] hover:bg-[#5D7CE0] text-white font-medium rounded-lg transition-colors duration-200">
                            Daftar
                        </button>
                    </div>

                    {{-- Login Link --}}
                    <div class="text-center pt-2">
                        <a href="{{ route('peserta.login') }}"
                           class="text-sm text-gray-600 hover:text-[#6F8FF9] transition-colors">
                            Sudah punya akun? <span class="font-semibold">Masuk</span>
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>

