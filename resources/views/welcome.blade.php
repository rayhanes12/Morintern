<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="bg-white">
        <!-- Navbar -->
        @if (Route::has('peserta.login'))
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <!-- Brand -->
                        <div class="flex items-center">
                            <span class="text-2xl font-bold">
                                <span class="text-white bg-gray-800 px-1">Mor</span><span class="text-[#6F8FF9]">Intern</span>
                            </span>
                        </div>

                        <!-- Auth Links -->
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('peserta.login') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                                    Login
                                </a>
                                @if (Route::has('peserta.register'))
                                    <a href="{{ route('peserta.register') }}" class="bg-[#6F8FF9] text-white px-6 py-2 rounded-lg hover:bg-[#5a7ad9] transition-colors font-medium">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        @endif

        <!-- Hero Section -->
        <section class="py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left: Text Content -->
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                            Temukan Peluang Magang Terbaik untuk Kariermu
                        </h1>
                        <p class="text-lg text-gray-600 mb-8">
                            Bergabunglah dengan ribuan mahasiswa yang telah memulai perjalanan karier mereka melalui program magang kami.
                        </p>
                        <a href="{{ route('peserta.register') }}" class="inline-block bg-[#6F8FF9] text-white px-8 py-3 rounded-lg hover:bg-[#5a7ad9] transition-colors font-semibold text-lg">
                            Mulai Sekarang
                        </a>
                    </div>

                    <!-- Right: Hero Image -->
                    <div>
                        <img src="{{ asset('assets/landing/hero-main-fix.png') }}" alt="Hero Image" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- Program Overview Section -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left: Collage Image -->
                    <div>
                        <img src="{{ asset('assets/landing/collage.png') }}" alt="Program Overview" class="w-full h-auto rounded-lg shadow-md">
                    </div>

                    <!-- Right: Text Content -->
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                            Tentang Program Magang
                        </h2>
                        <p class="text-lg text-gray-600">
                            Program magang kami dirancang untuk membantu mahasiswa mendapatkan pengalaman kerja nyata di industri. Dengan berbagai pilihan bidang dan perusahaan terkemuka, kami siap membantu Anda mengembangkan keterampilan profesional.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Open Internship Positions Section -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        Posisi Magang Tersedia
                    </h2>
                    <p class="text-lg text-gray-600">
                        Pilih bidang yang sesuai dengan minat dan keahlianmu
                    </p>
                </div>

                <!-- Cards Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('assets/landing/feature-1.jpg') }}" alt="Web Development" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                Web Development
                            </h3>
                            <div class="space-y-2 text-gray-600">
                                <p><span class="font-medium">Kuota:</span> 10</p>
                                <p><span class="font-medium">Durasi:</span> 3 bulan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('assets/landing/feature-2.jpg') }}" alt="Mobile Development" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                Mobile Development
                            </h3>
                            <div class="space-y-2 text-gray-600">
                                <p><span class="font-medium">Kuota:</span> 8</p>
                                <p><span class="font-medium">Durasi:</span> 3 bulan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('assets/landing/feature-3.jpg') }}" alt="UI/UX Design" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                UI/UX Design
                            </h3>
                            <div class="space-y-2 text-gray-600">
                                <p><span class="font-medium">Kuota:</span> 6</p>
                                <p><span class="font-medium">Durasi:</span> 3 bulan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="{{ asset('assets/landing/feature-4.jpg') }}" alt="Data Science" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                Data Science
                            </h3>
                            <div class="space-y-2 text-gray-600">
                                <p><span class="font-medium">Kuota:</span> 5</p>
                                <p><span class="font-medium">Durasi:</span> 4 bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm">
                        &copy; {{ date('Y') }} MorIntern. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
