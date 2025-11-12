<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MorIntern | Magang Mudah & Terpercaya</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    {{-- Vite for CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Meta Tags --}}
    <meta name="description" content="Platform MorIntern membantu mahasiswa menemukan magang impian dengan mudah dan efisien.">
    <meta name="keywords" content="magang, morintern, kampus merdeka, internship, HRD, peserta">
    <meta name="author" content="MorIntern Team">

    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="antialiased bg-white text-gray-900">

    {{-- Wrapper utama --}}
    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen flex flex-col">

        {{-- Konten dinamis (tiap halaman) --}}
        @yield('content')

    </div>

    {{-- Footer scripts tambahan jika dibutuhkan --}}
    @stack('scripts')

</body>
</html>
