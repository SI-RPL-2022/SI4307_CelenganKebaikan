

<?php $__env->startSection('main'); ?>
    <div class="container mt-5">
        <div class="card" style="margin-top: 100px">
            <div class="card-header">
                <?php echo e($donasi->judul_donasi); ?>

            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>
                            Detail
                        </th>
                    </tr>
                    <tr>
                        <th>Target Donasi</th>
                        <th>:</th>
                        <td>
                            <span id="uang"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Penerima</th>
                        <th>:</th>
                        <td>
                            <?php echo e($donasi->penerima); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dilayangkan Oleh
                        </th>
                        <th>:</th>
                        <td>
                            <?php echo e($donasi->user->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>Terkumpul</th>
                        <th>:</th>
                        <td>
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $i += $item->jumlah_transaksi;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <span id="jumlah_transaksi"></span>
                        </td>
                    </tr>
                    <tr class="mx-auto">
                        <center>
                            <img width="500" src="<?php echo e(Storage::url($donasi->photo)); ?>" alt="">
                        </center>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <div class="progress">
                    <div class="progress-bar" role="progressbar"
                        style="width: <?php echo e($i == 0 ? 0 : ((($i / (int) $donasi->target_donasi) * 100) / 100) * 100); ?>%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Transaksi
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('donasi.transaksi')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="donation_id" value="<?php echo e($donasi->id); ?>">
                    <div class="form-group">
                        <label for="">Jumlah Transaksi</label>
                        <input type="number" name="jumlah_transaksi" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment</label>
                        <select name="payment" id="" class="form-control">
                            <option value="" selected>Pilih Payment...</option>
                            <option value="" disabled>Dompet Digital</option>
                            <option value="dana">Dana</option>
                            <option value="ovo">OVO</option>
                            <option value="" disabled>Transaksi Antar Bank</option>
                            <option value="bri">BRI</option>
                            <option value="bca">BCA</option>
                            <option value="mandiri">Mandiri</option>
                            <option value="bni">BNI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor</label>
                        <input type="number" name="nomor" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sembunyikan Profil</label>
                        <input type="checkbox" name="hide" value="Y" id="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Donatur
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Donatur</th>
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
                                    <?php if($item->hide == 'Y'): ?>
                                        Donatur
                                    <?php else: ?>
                                        <?php echo e($item->user->name); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($item->jumlah_transaksi); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <th>Belum Ada Donatur</th>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        const uang = document.getElementById('uang')
        const jumlah_transaksi = document.getElementById('jumlah_transaksi')

        uang.textContent = "Rp." + (<?php echo e($donasi->target_donasi); ?>).toLocaleString()
        jumlah_transaksi.textContent = "Rp." + (<?php echo e($i); ?>).toLocaleString()
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI40307_CelenganKebaikan\webdonasi-master\resources\views/pengguna/donation/show.blade.php ENDPATH**/ ?>