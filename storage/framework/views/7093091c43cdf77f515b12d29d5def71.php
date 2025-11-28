<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white text-[#0F172A]">

    
    <?php echo $__env->make('landing.components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="landing-content">

        
        <?php echo $__env->make('landing.components.hero', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <section id="program" class="py-20 bg-gradient-to-b from-white to-gray-50">
            <?php echo $__env->make('landing.components.features', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </section>

        
        <section id="lowongan" class="py-20 bg-gray-50 border-t">
            <?php echo $__env->make('landing.components.jobs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </section>

        
        <section id="get-started" 
            class="py-20 text-center bg-gradient-to-b from-gray-50 to-[#648DDB] text-white">

            <h2 class="text-3xl font-bold mb-6">Siap Memulai Karier Profesionalmu?</h2>

            <p class="max-w-2xl mx-auto text-lg opacity-90">
                Daftar sekarang dan bergabung dalam program magang MorIntern untuk mendapatkan pengalaman dunia kerja yang sesungguhnya.
            </p>

            <a href="<?php echo e(route('peserta.register')); ?>" 
                class="inline-block mt-8 bg-white text-[#648DDB] px-10 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition">
                Daftar Sekarang
            </a>
        </section>

        
        <?php echo $__env->make('landing.components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\2 - Magang Kampus\Morintern\Morintern\resources\views/landing/landing.blade.php ENDPATH**/ ?>