

<?php $__env->startSection('main'); ?>
    <div class="container mt-5">
        <?php if(auth()->guard()->check()): ?>
            <div class="card" style="margin-top: 200px">
                <div class="card-header">
                    Riwayat Transaksimu
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Donasi</th>
                                <th>Jumlah Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->donasi->judul_donasi); ?>

                                    </td>
                                    <td class="rupiah">
                                        <?php echo e($item->jumlah_transaksi); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <th>Belum Ada Riwayat</th>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            Kamu Belum Login, Silakan <a href="/login">Login</a> dahulu!
        <?php endif; ?>
    </div>

    <script>
        const name = document.querySelectorAll('.rupiah')
        name.forEach(e => {
            console.log(e.textContent.toLocaleString())
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI40307_CelenganKebaikan\webdonasi-master\resources\views/pengguna/riwayat-donasi.blade.php ENDPATH**/ ?>