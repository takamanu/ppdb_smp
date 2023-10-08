

<?php $__env->startSection('container'); ?>
    <div class="container">
        <h1>Upload Files</h1>
        <form action="<?php echo e(route('registrasi_ulang.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label for="ijazah" class="form-label">Ijazah</label></td>
                        <td>
                            <input type="file" class="form-control <?php $__errorArgs = ['ijazah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ijazah"
                                name="ijazah" accept=".pdf,.docx">
                            <?php $__errorArgs = ['ijazah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="surat_pernyataan_bermaterai" class="form-label">Surat Pernyataan Bermaterai</label>
                        </td>
                        <td>
                            <input type="file"
                                class="form-control <?php $__errorArgs = ['surat_pernyataan_bermaterai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="surat_pernyataan_bermaterai" name="surat_pernyataan_bermaterai" accept=".pdf,.docx">
                            <?php $__errorArgs = ['surat_pernyataan_bermaterai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="surat_keterangan_siswa_aktif_sd_asal" class="form-label">Surat Keterangan Siswa
                                Aktif SD Asal</label></td>
                        <td>
                            <input type="file"
                                class="form-control <?php $__errorArgs = ['surat_keterangan_siswa_aktif_sd_asal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="surat_keterangan_siswa_aktif_sd_asal" name="surat_keterangan_siswa_aktif_sd_asal"
                                accept=".pdf,.docx">
                            <?php $__errorArgs = ['surat_keterangan_siswa_aktif_sd_asal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="pasfoto" class="form-label">Pasfoto</label></td>
                        <td>
                            <input type="file" class="form-control <?php $__errorArgs = ['pasfoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pasfoto"
                                name="pasfoto" accept=".jpg,.jpeg,.png">
                            <?php $__errorArgs = ['pasfoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="akta_kelahiran" class="form-label">Akta Kelahiran</label></td>
                        <td>
                            <input type="file" class="form-control <?php $__errorArgs = ['akta_kelahiran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="akta_kelahiran" name="akta_kelahiran" accept=".pdf,.docx">
                            <?php $__errorArgs = ['akta_kelahiran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="kk" class="form-label">Kartu Keluarga (KK)</label></td>
                        <td>
                            <input type="file" class="form-control <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kk"
                                name="kk" accept=".pdf,.docx">
                            <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="type"
            onclick="return confirm(&quot;Apakah anda yakin dengan data anda?&quot;)"
                class="btn btn-success btn-block">Upload</button>
        </form>
    </div>
    <script>
        function showSweetAlert() {
            Swal.fire({
                title: "Apakah anda sudah yakin dengan data yang akan anda submit?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Saya Yakin",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Ya, Saya Yakin," submit the form
                    document.querySelector('form').submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/siswa/registrasi.blade.php ENDPATH**/ ?>