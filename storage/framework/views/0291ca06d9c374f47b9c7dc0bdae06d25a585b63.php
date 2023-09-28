

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Masukkan nilai <?php echo e($agen->nama_lengkap); ?></h2>
    <?php if(session('flash_message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('flash_message')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <form action="<?php echo e(url('agen/nilai/update/' . $agen->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Tes</th>
                        <th>Nilai</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Matematika</td>
                        <td>
                            <input type="text" name="matematika" value="<?php echo e($agen->nilai->matematika); ?>" class="form-control">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>
                            <input type="text" name="ilmu_pengetahuan_alam" value="<?php echo e($agen->nilai->ilmu_pengetahuan_alam); ?>" class="form-control">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>
                            <input type="text" name="bahasa_indonesia" value="<?php echo e($agen->nilai->bahasa_indonesia); ?>" class="form-control">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <input type="text" name="test_membaca_al_quran" value="<?php echo e($agen->nilai->test_membaca_al_quran); ?>" class="form-control">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Status Kelulusan</td>
                        <td>
                            <select name="status" class="form-select form-control" required>
                            <option selected value="<?php echo e($agen->nilai->status); ?>"> <?php echo e($agen->nilai->status); ?> </option>
                            <?php if($agen->nilai->status == "BELUM LULUS"): ?>
                                <option value="LULUS"> LULUS </option>
                            <?php else: ?>
                                <option value="BELUM LULUS"> BELUM LULUS </option>
                            <?php endif; ?>
                            
                        </td>
                        
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <button class="btn btn-success btn-block" type="submit">Submit nilai</button>
        </form>
    </div>

    
    <a href="/agen" class="btn btn-primary btn-block">Kembali ke dashboard</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\OneDrive\Desktop\ppdb_smp\resources\views/agen/nilai.blade.php ENDPATH**/ ?>