

<?php $__env->startSection('main'); ?>
    <div class="container mt-5" style="margin-top: 200px">
        <div class="card mt-5 mx-auto" style="max-width: 35rem">
            <div class="card-header">
                Buat Donasimu
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('donasi.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="status" value="proses">
                    <div class="form-group">
                        <label for="">Judul Donasi</label>
                        <input type="text" name="judul_donasi" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Penerima</label>
                        <input type="text" name="penerima" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Target Donasi</label>
                        <input type="text" name="target_donasi" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" name="photo" class="form-control" id="">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-success btn-block">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI40307_CelenganKebaikan\webdonasi-master\resources\views/pengguna/donation/create.blade.php ENDPATH**/ ?>