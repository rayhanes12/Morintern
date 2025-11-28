
<section id="hero" class="pt-10 pb-20 bg-white relative overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

            <!-- Left Content -->
            <div class="max-w-xl">
                <h1 class="text-4xl lg:text-6xl font-bold text-[#0F172A] leading-[1.2]">
                    Kesempatan Magang untuk Generasi Muda Inovatif
                </h1>
                <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                    Mulai langkah pertama menuju karier impianmu melalui program magang 
                    yang memberikan pengalaman nyata, pembelajaran langsung di industri, 
                    dan kesempatan berjejaring bersama profesional berpengalaman.
                </p>

                <div class="mt-10">
                    <a href="#lowongan" 
                    class="inline-block bg-[#648DDB] hover:bg-[#527BC8] text-white px-7 py-3 rounded-lg font-semibold shadow-md transition">
                        Cari Lowongan
                    </a>
                </div>
            </div>

            <!-- Right Illustration with Floating Cards -->
            <div class="relative flex justify-center lg:justify-end">
                <div class="w-full max-w-lg relative">

                    <!-- Floating Badge - Top Left -->
                    <div class="absolute -top-6 -left-6 bg-white/70 backdrop-blur-xl border border-gray-200 
                                shadow-xl rounded-2xl p-4 w-48 z-20 flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <img src="<?php echo e(asset('assets/landing/search-job.svg')); ?>" class="w-7 h-7" alt="job-icon">
                        </div>
                        <div>
                            <p class="text-xl font-bold text-blue-600">10+</p>
                            <p class="text-gray-800 text-sm">Lowongan Tersedia</p>
                        </div>
                    </div>

                    <!-- Main Illustration -->
                    <img src="<?php echo e(asset('assets/landing/hero-main.png')); ?>" 
                        alt="Hero Illustration" 
                        class="w-full h-auto object-contain relative z-10 drop-shadow-lg">

                    <!-- Floating Stats - Bottom Right -->
                    <div class="absolute -bottom-6 -right-6 bg-white/70 backdrop-blur-xl border border-gray-200 
                                shadow-xl rounded-2xl p-4 w-60 z-20 flex items-center justify-between">
                        <div>
                            <p class="text-2xl font-bold text-blue-600">10K+</p>
                            <p class="text-gray-700 text-xs">Dilihat Pelamar</p>
                        </div>

                        <div class="flex items-center -space-x-2">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#f97316">A</div>
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#06b6d4">B</div>
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-medium text-white" style="background:#8b5cf6">C</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Soft gradient background decoration -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-200/30 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
</section>
<?php /**PATH E:\2 - Magang Kampus\Morintern\Morintern\resources\views/landing/components/hero.blade.php ENDPATH**/ ?>