

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Aktivitas</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pendaftaran Akun PPDB</td>
                    <td><?php echo e($config->pendaftaran_akun_ppdb_start); ?></td>
                    <td><?php echo e($config->pendaftaran_akun_ppdb_due); ?></td>
                </tr>
                <tr>
                    <td>Pengumpulan berkas</td>
                    <td><?php echo e($config->pengumpulan_berkas_start); ?></td>
                    <td><?php echo e($config->pengumpulan_berkas_due); ?></td>
                </tr>
                <tr>
                    <td>Tes Akademik</td>
                    <td><?php echo e($config->test_akademik_start); ?></td>
                    <td><?php echo e($config->test_akademik_due); ?></td>
                </tr>
                <tr>
                    <td>Tes Baca Al-Qur'an</td>
                    <td><?php echo e($config->test_baca_al_quran_start); ?></td>
                    <td><?php echo e($config->test_baca_al_quran_due); ?></td>
                </tr>
                
                <tr>
                    <td>Pendaftaran Ulang</td>
                    <td><?php echo e($config->pendaftaran_ulang_start); ?></td>
                    <td><?php echo e($config->pendaftaran_ulang_due); ?></td>
                </tr>
                <tr>
                    <td>Link WhatsApp</td>
                    <td colspan="2"><a href="<?php echo e($config->redirect_wa); ?>"><?php echo e($config->redirect_wa); ?></a></td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <a href="/config/edit" class="btn btn-warning btn-block">Update tanggal</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\OneDrive\Desktop\ppdb_smp\resources\views/config/index.blade.php ENDPATH**/ ?>