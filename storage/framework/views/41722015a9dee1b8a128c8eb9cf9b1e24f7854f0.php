

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Donasi
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Donasi</th>
                        <th>
                            Target
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th>
                                <?php echo e($loop->iteration); ?>

                            </th>
                            <td>
                                <?php echo e($item->judul_donasi); ?>

                            </td>
                            <td>
                                <?php echo e($item->target_donasi); ?>

                            </td>
                            <td>
                                <form action="<?php echo e(route('donation.destroy', $item->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI40307_CelenganKebaikan\webdonasi-master\resources\views/donation/index.blade.php ENDPATH**/ ?>