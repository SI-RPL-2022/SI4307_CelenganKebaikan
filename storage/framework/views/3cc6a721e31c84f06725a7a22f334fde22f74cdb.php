

<?php $__env->startSection('main'); ?>
    <section id="features" class="features">
        <div class="container">

            <div class="section-title">
                <h2>Daftar Donasi</h2>
                <?php if(auth()->guard()->check()): ?>
                    <h5>
                        <a href="<?php echo e(route('donasi.create')); ?>" class="text-primary">Buat Donasi</a>
                    </h5>
                <?php endif; ?>
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <?php $__empty_1 = true; $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card">
                        <div class="card-header text-center">
                            <?php echo e($item->judul_donasi); ?>

                        </div>
                        <div class="card-body">
                            <img width="400" src="<?php echo e(Storage::url($item->photo)); ?>" alt="<?php echo e($item->judul_donasi); ?>" />
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('donasi.show', $item->id)); ?>" class="btn btn-success text-center">Detail</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <center>
                        Belum Ada Donasi
                    </center>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI40307_CelenganKebaikan\webdonasi-master\resources\views/pengguna/donation/index.blade.php ENDPATH**/ ?>