

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Hasil Pengumuman <?php echo e($siswa->nama_lengkap); ?></h2>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Tes</th>
                    <th>Hasil Nilai</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matematika</td>
                    <td> <?php echo e($siswa->nilai->matematika); ?></td>
                    
                </tr>
                <tr>
                    <td>Ilmu Pengetahuan Alam</td>
                    <td><?php echo e($siswa->nilai->ilmu_pengetahuan_alam); ?></td>
                    
                </tr>
                <tr>
                    <td>Bahasa Indonesia</td>
                    <td><?php echo e($siswa->nilai->bahasa_indonesia); ?></td>
                    
                </tr>
                <tr>
                    <td>Tes Baca Al-Qur'an</td>
                    <td><?php echo e($siswa->nilai->test_membaca_al_quran); ?></td>
                    
                </tr>
                
                <tr>
                    <td>Hasil tes</td>
                    <td><?php echo e($siswa->nilai->status); ?></td>
                    

                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <?php if($user->datapokok->nilai->status == "Tidak Lulus"): ?>
        <a href="#" class="btn btn-primary btn-block" disabled>Jangan putus asa dan tetep semangat!</a>
    <?php elseif(is_null(Auth::user()->registrasi_ulang)): ?>
        <a href="<?php echo e(url('/siswa/registrasi/' . $siswa->id)); ?>" class="btn btn-primary btn-block">Registrasi Ulang</a>
    <?php else: ?>
        <button onclick="alert('Kamu sudah melakukan registrasi ulang!')" class="btn btn-primary btn-block mb-3" disabled>Registrasi Ulang</button>
        <div class="alert alert-success mb-3">
            Kamu sudah melakukan registrasi ulang!
        </div>
        <div class="alert alert-success">
            Silahkan join grup whatsapp: <?php echo e($config->redirect_wa); ?>

        </div>
    <?php endif; ?>

    <hr>
    <a href="<?php echo e(url('/siswa/cetak/' . $siswa->id)); ?>" title="Cetak Datapokok Siswa" class="btn btn-success btn-block">Cetak
        Datapokok</a>
    
    <a href="/siswa" class="btn btn-warning btn-block">Kembali ke dashboard</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/siswa/pengumuman.blade.php ENDPATH**/ ?>