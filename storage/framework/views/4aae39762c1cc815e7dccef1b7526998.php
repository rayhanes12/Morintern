<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white">
    <!-- Include all components -->
    <?php echo $__env->make('landing.components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="pt-0 landing-content">
        <?php echo $__env->make('landing.components.hero', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('landing.components.features', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('landing.components.jobs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- CTA -->
        <section id="get-started" class="mt-16 text-center">
            <a href="<?php echo e(route('peserta.register')); ?>" class="inline-block bg-[#648DDB] text-white px-8 py-3 rounded-md font-semibold">Mulai Sekarang</a>
        </section>

        <?php echo $__env->make('landing.components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/landing/landing.blade.php ENDPATH**/ ?>