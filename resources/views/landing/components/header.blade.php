{{-- Component: header (pixel-accurate to Frame24) --}}
<header class="w-full">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12 py-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center gap-3">

                <span class="text-xl font-semibold text-[#0F172A]">Mor<span class="text-[#648DDB]">Intern</span></span>
            </a>
        </div>

        <!-- Mobile menu button -->
        <button type="button" class="lg:hidden" @click="mobileMenuOpen = !mobileMenuOpen">
            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <nav class="hidden lg:flex items-center gap-8 text-sm">
            <a href="#" class="text-[#0F172A]">Home</a>
            <a href="#" class="text-[#0F172A]">Tentang</a>
            <a href="#" class="text-[#0F172A]">Kontak</a>
            @if(Auth::guard('peserta')->check())
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-[#648DDB] text-white rounded-md text-sm">Profil Peserta</a>
                <form method="POST" action="{{ route('peserta.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 border border-gray-200 rounded-md text-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('peserta.login') }}" class="px-4 py-2 border border-gray-200 rounded-md text-sm">Masuk</a>
                <a href="{{ route('peserta.register') }}" class="px-4 py-2 bg-[#648DDB] text-white rounded-md text-sm">Daftar</a>
            @endif
        </nav>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" class="lg:hidden" style="display: none;">
        <nav class="px-8 py-4 space-y-4">
            <a href="#" class="block text-[#0F172A]">Home</a>
            <a href="#" class="block text-[#0F172A]">Tentang</a>
            <a href="#" class="block text-[#0F172A]">Kontak</a>
            <div class="space-y-2">
                @if(Auth::guard('peserta')->check())
                    <a href="{{ route('profile.edit') }}" class="block w-full text-center px-4 py-2 bg-[#648DDB] text-white rounded-md text-sm">Profil Peserta</a>
                    <form method="POST" action="{{ route('peserta.logout') }}" class="block w-full text-center">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 border border-gray-200 rounded-md text-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('peserta.login') }}" class="block w-full text-center px-4 py-2 border border-gray-200 rounded-md text-sm">Masuk</a>
                    <a href="{{ route('peserta.register') }}" class="block w-full text-center px-4 py-2 bg-[#648DDB] text-white rounded-md text-sm">Daftar</a>
                @endif
            </div>
        </nav>
    </div>
</header>