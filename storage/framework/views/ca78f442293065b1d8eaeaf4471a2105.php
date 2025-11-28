<!-- Jobs section -->
<section id="lowongan" class="bg-white mt-8">
    <div class="bg-[#648DDB] text-white text-center py-6">
        <h3 class="text-xl lg:text-2xl font-semibold">LOWONGAN TERSEDIA</h3>
    </div>

    <div class="max-w-[1440px] mx-auto px-8 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Quality assurance','Backend Dev','System Analys','Front And']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <h4 class="font-semibold text-lg text-[#0F172A] mb-3"><?php echo e($job); ?></h4>
                <ul class="text-gray-600 list-disc list-inside space-y-2">
                    <li>Mahasiswa aktif atau lulusan maksimal 1 tahun.</li>
                    <li>Memiliki semangat belajar tinggi dan mampu bekerja dalam tim.</li>
                    <li>Bersedia mengikuti program selama periode magang.</li>
                    <li>Menguasai dasar-dasar sesuai posisi yang dilamar.</li>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="text-center mt-10">
            <a href="<?php echo e(route('peserta.register')); ?>" class="px-6 py-2 bg-white border rounded-md text-[#648DDB] font-semibold">DAFTAR</a>
            <div class="mt-4">
                <a href="#" class="px-6 py-2 bg-[#648DDB] text-white rounded-md">LIHAT LOWONGAN LAINNYA</a>
            </div>
        </div>
    </div>
</section>
<!-- Jobs section -->
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/landing/components/jobs.blade.php ENDPATH**/ ?>