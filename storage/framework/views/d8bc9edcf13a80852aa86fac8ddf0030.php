<!-- Jobs section -->
<section id="lowongan" class="bg-gray-50 py-16">
    <!-- Header -->
    <div class="text-center mb-12">
        <h3 class="text-3xl lg:text-4xl font-bold text-[#0F172A]">
            Lowongan Magang Tersedia
        </h3>
        <p class="text-gray-600 mt-3 text-lg max-w-2xl mx-auto">
            Temukan posisi magang yang sesuai dengan minat dan kemampuanmu. Mari mulai perjalanan karirmu bersama kami.
        </p>
    </div>

    <!-- Grid -->
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Quality Assurance','Backend Developer','System Analyst','Frontend Developer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-xl shadow-md border hover:shadow-xl transition-all duration-300 p-6 group">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold text-xl text-[#0F172A] group-hover:text-[#648DDB] transition-colors">
                        <?php echo e($job); ?>

                    </h4>
                    <span class="text-[#648DDB] text-sm font-medium bg-[#E8F0FF] px-2 py-1 rounded-md">
                        Magang
                    </span>
                </div>

                <ul class="text-gray-600 space-y-2 text-sm leading-relaxed">
                    <li>Mahasiswa aktif atau lulusan maksimal 1 tahun.</li>
                    <li>Semangat belajar tinggi & mampu bekerja dalam tim.</li>
                    <li>Bersedia mengikuti program magang selama periode.</li>
                    <li>Memahami dasar-dasar sesuai posisi yang dilamar.</li>
                </ul>

                <div class="mt-6">
                    <a href="<?php echo e(route('peserta.register')); ?>"
                    class="block w-full text-center bg-[#648DDB] text-white py-2 rounded-lg font-medium hover:bg-[#527bc8] transition">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- CTA Buttons -->
        <div class="text-center mt-14">
            <a href="<?php echo e(route('peserta.register')); ?>"
            class="inline-block px-8 py-3 bg-[#648DDB] text-white font-semibold rounded-lg shadow-md hover:bg-[#527bc8] transition">
                Daftar Magang
            </a>

            <div class="mt-4">
                <a href="#"
                class="inline-block px-8 py-3 bg-white border border-[#648DDB] text-[#648DDB] rounded-lg font-semibold hover:bg-[#f5f7ff] transition">
                    Lihat Lowongan Lainnya
                </a>
            </div>

            <!-- Perguruan Tinggi Mitra -->
            

        </div>
    </div>
</section>

<?php /**PATH E:\2 - Magang Kampus\Morintern\Morintern\resources\views/landing/components/jobs.blade.php ENDPATH**/ ?>