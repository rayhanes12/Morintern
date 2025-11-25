<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Register</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen w-full flex items-center justify-center bg-[#6F8FF9] font-['Plus_Jakarta_Sans'] px-6">

        {{-- Logo --}}
        <div class="absolute top-8 left-8">
            <a href="{{ url('/') }}" class="text-white text-2xl font-bold tracking-wide">
                MorIntern
            </a>
        </div>

        {{-- Main container --}}
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            {{-- Left Illustration --}}
            <div class="flex justify-center">
                <img src="{{ asset('assets/landing/ilustrasi-register.svg') }}"
                     alt="Ilustrasi Register"
                     class="max-w-[450px] h-auto">
            </div>

            {{-- Right Form --}}
            <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">

                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Daftar Sebagai HRD</h1>
                    <p class="text-gray-500 text-sm">Buat akun HRD Anda di bawah ini</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            required
                            placeholder="Masukkan nama lengkap"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            placeholder="email@example.com"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input 
                            type="password" 
                            name="password"
                            required
                            placeholder="Masukkan password"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation"
                            required
                            placeholder="Ulangi password"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                    </div>

                    {{-- Submit --}}
                    <button 
                        type="submit"
                        class="w-full h-12 bg-[#6F8FF9] text-white font-semibold rounded-lg 
                               hover:bg-[#5c77d8] transition shadow">
                        Daftar
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-[#6F8FF9] hover:underline">Masuk</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
