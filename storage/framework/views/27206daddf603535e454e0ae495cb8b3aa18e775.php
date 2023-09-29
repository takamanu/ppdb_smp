

<?php $__env->startSection('container'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Registrasi Ulang <?php echo e($siswa->nama_lengkap); ?></h2>
            </div>
            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('registrasi_ulang.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><label for="ijazah" class="form-label">Ijazah</label></td>
                                <td><input type="file" class="form-control" id="ijazah" name="ijazah" accept=".pdf,.docx"></td>
                            </tr>
                            <tr>
                                <td><label for="surat_pernyataan_bermaterai" class="form-label">Surat Pernyataan Bermaterai</label></td>
                                <td><input type="file" class="form-control" id="surat_pernyataan_bermaterai" name="surat_pernyataan_bermaterai" accept=".pdf,.docx"></td>
                            </tr>
                            <tr>
                                <td><label for="surat_keterangan_siswa_aktif_sd_asal" class="form-label">Surat Keterangan Siswa Aktif SD Asal</label></td>
                                <td><input type="file" class="form-control" id="surat_keterangan_siswa_aktif_sd_asal" name="surat_keterangan_siswa_aktif_sd_asal" accept=".pdf,.docx"></td>
                            </tr>
                            <tr>
                                <td><label for="pasfoto" class="form-label">Pasfoto</label></td>
                                <td><input type="file" class="form-control" id="pasfoto" name="pasfoto" accept=".jpg,.jpeg,.png"></td>
                            </tr>
                            <tr>
                                <td><label for="akta_kelahiran" class="form-label">Akta Kelahiran</label></td>
                                <td><input type="file" class="form-control" id="akta_kelahiran" name="akta_kelahiran" accept=".pdf,.docx"></td>
                            </tr>
                            <tr>
                                <td><label for="kk" class="form-label">Kartu Keluarga (KK)</label></td>
                                <td><input type="file" class="form-control" id="kk" name="kk" accept=".pdf,.docx"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success btn-block">Upload</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/siswa/registrasi.blade.php ENDPATH**/ ?>