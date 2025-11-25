<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lupa Password - {{ config('app.name') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased">

    <div class="min-h-screen w-full flex items-center justify-center bg-[#6F8FF9] px-6">

        {{-- Brand --}}
        <div class="absolute top-8 left-8">
            <a href="{{ url('/') }}" class="text-2xl font-bold tracking-tight">
                <span class="text-white">Mor</span>
                <span class="text-[#6F8FF9] bg-white px-1 rounded">Intern</span>
            </a>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Lupa Password</h1>
                <p class="text-gray-500 text-sm">
                    Masukkan alamat email Anda untuk menerima link reset password.
                </p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center font-medium">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email') }}" required autofocus
                        placeholder="email@example.com"
                        class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9]
                               text-gray-900 placeholder-gray-400
                               focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9]/20 transition">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full bg-[#6F8FF9] text-white py-3 rounded-lg font-semibold
                           hover:bg-[#5A79E6] transition shadow-md">
                    Kirim Link Reset Password
                </button>

                {{-- Back to Login --}}
                <p class="mt-4 text-center text-sm text-gray-600">
                    Sudah ingat password?
                    <a href="{{ route('login') }}" 
                    class="font-semibold text-[#6F8FF9] hover:underline">
                        Masuk di sini
                    </a>
                </p>
            </form>
        </div>

    </div>

</body>
</html>
