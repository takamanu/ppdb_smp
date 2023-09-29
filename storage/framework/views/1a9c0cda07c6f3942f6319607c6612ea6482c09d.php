

<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
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
                        <div class="input-group mb-3">
                            <img class="img-thumbnail rounded-circle" src="<?php echo e(asset(Auth::user()->avatar)); ?>">
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" aria-label="First name" class="form-control" value="<?php echo e($agen->name); ?>" disabled>
                
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="text" aria-label="First name" class="form-control" value="<?php echo e($agen->email); ?>" disabled>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="password" aria-label="First name" class="form-control" value="password123" disabled>
                        </div>
                        <a href="<?php echo e(url('/profile/' . $agen->id . '/edit')); ?>" class="btn btn-success">Edit
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/profile/index.blade.php ENDPATH**/ ?>