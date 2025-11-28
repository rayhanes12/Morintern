
<header class="w-full border-b border-gray-100 bg-white backdrop-blur-sm" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12 py-5 flex items-center justify-between">

        <!-- Logo (Left) -->
        <a href="/" class="flex items-center gap-2 select-none">
            <span class="text-2xl font-bold tracking-tight text-[#0F172A]">
                Mor<span class="text-[#648DDB]">Intern</span>
            </span>
        </a>

        <!-- Navigation (Center) -->
        <nav class="hidden lg:flex items-center gap-10 text-sm font-medium absolute left-1/2 transform -translate-x-1/2">
            <a href="/" class="text-gray-700 hover:text-[#648DDB] transition">Home</a>
            <a href="#program" class="text-gray-700 hover:text-[#648DDB] transition">Tentang</a>
            <a href="#kontak" class="text-gray-700 hover:text-[#648DDB] transition">Kontak</a>
        </nav>

        <!-- Right Side (Auth Buttons) -->
        <div class="hidden lg:flex items-center gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::guard('peserta')->check()): ?>
                <a href="<?php echo e(route('peserta.profil')); ?>" 
                   class="px-5 py-2 bg-[#648DDB] hover:bg-[#527BC8] text-white rounded-lg shadow-sm transition">
                    Profil Peserta
                </a>

                <form method="POST" action="<?php echo e(route('peserta.logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" 
                            class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('peserta.login')); ?>" 
                   class="px-5 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Masuk
                </a>
                <a href="<?php echo e(route('peserta.register')); ?>" 
                   class="px-5 py-2 bg-[#648DDB] hover:bg-[#527BC8] text-white rounded-lg shadow-sm transition">
                    Daftar
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Mobile menu button -->
        <button type="button" 
                class="lg:hidden text-gray-700" 
                @click="mobileMenuOpen = !mobileMenuOpen">
            <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                <path stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" class="lg:hidden bg-white border-t border-gray-100" style="display: none;">
        <nav class="px-8 py-4 space-y-4 text-sm font-medium">
            <a href="/" class="block text-[#0F172A] hover:text-[#648DDB]">Home</a>
            <a href="#program" class="block text-[#0F172A] hover:text-[#648DDB]">Tentang</a>
            <a href="#kontak" class="block text-[#0F172A] hover:text-[#648DDB]">Kontak</a>

            <div class="pt-2 space-y-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::guard('peserta')->check()): ?>
                    <a href="<?php echo e(route('peserta.profil')); ?>" 
                       class="block w-full text-center px-4 py-2 bg-[#648DDB] hover:bg-[#527BC8] text-white rounded-lg">
                        Profil Peserta
                    </a>

                    <form method="POST" action="<?php echo e(route('peserta.logout')); ?>" class="block w-full text-center">
                        <?php echo csrf_field(); ?>
                        <button type="submit" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Logout
                        </button>
                    </form>

                <?php else: ?>
                    <a href="<?php echo e(route('peserta.login')); ?>" 
                       class="block w-full text-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Masuk
                    </a>

                    <a href="<?php echo e(route('peserta.register')); ?>" 
                       class="block w-full text-center px-4 py-2 bg-[#648DDB] hover:bg-[#527BC8] text-white rounded-lg">
                        Daftar
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH E:\2 - Magang Kampus\Morintern\Morintern\resources\views/landing/components/header.blade.php ENDPATH**/ ?>