

<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    User Management
                </span>
                <span>
                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary">+ Create User</a>
                </span>
            </div>
            <div class="card-body">
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e($message); ?>

                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th>
                                    <?php echo e($loop->iteration); ?>

                                </th>
                                <td>
                                    <?php echo e($item->name); ?>

                                </td>
                                <td>
                                    <?php echo e($item->email); ?>

                                </td>
                                <td>
                                    <?php echo e($item->role->nama); ?>

                                </td>
                                <td class="d-flex">
                                    <a href="<?php echo e(route('user.edit', $item->id)); ?>" class="btn btn-success">Edit</a>
                                    <form action="<?php echo e(route('user.destroy', $item->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-danger ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <th>Belum Ada Data</th>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI40307_CelenganKebaikan\webdonasi-master\resources\views/user/index.blade.php ENDPATH**/ ?>