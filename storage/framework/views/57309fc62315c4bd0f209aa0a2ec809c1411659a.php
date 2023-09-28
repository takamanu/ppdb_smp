

<?php $__env->startSection('container'); ?>
    <style>
        .input-group-text {
            width: 8rem !important;
        }
    </style>
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h2>Profil</h2>
            </div>

            <?php if(session('flash_message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('flash_message')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('flash_message_error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('flash_message_error')); ?>

                </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <img class="img-thumbnail rounded-circle w-25" src="<?php echo e(asset(Auth::user()->avatar)); ?>">
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo e($agen->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($agen->email); ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>*******</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



            <a href="<?php echo e(url('/profile/' . $agen->id . '/edit')); ?>" class="btn btn-success btn-block">Edit Profile
            </a>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\OneDrive\Desktop\ppdb_smp\resources\views/profile/index.blade.php ENDPATH**/ ?>