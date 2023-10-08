

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Masukkan nilai <?php echo e($agen->nama_lengkap); ?></h2>
    <?php if(session('flash_message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('flash_message')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <form action="<?php echo e(url('agen/nilai/update/' . $agen->user_id)); ?>" method="post">
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
                            <div class="form-group form-outline">
                                <select id="matematika"
                                    class="form-select form-control <?php $__errorArgs = ['matematika'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="matematika" required>
                                    <option value="E" disabled <?php echo e($agen->nilai->matematika == 'E' ? 'selected' : ''); ?>>
                                        Pilih nilai A-E</option>
                                    <option value="A" <?php echo e($agen->nilai->matematika == 'A' ? 'selected' : ''); ?>>A
                                    </option>
                                    <option value="B" <?php echo e($agen->nilai->matematika == 'B' ? 'selected' : ''); ?>>B
                                    </option>
                                    <option value="C" <?php echo e($agen->nilai->matematika == 'C' ? 'selected' : ''); ?>>C
                                    </option>
                                    <option value="D" <?php echo e($agen->nilai->matematika == 'D' ? 'selected' : ''); ?>>D
                                    </option>
                                    <option value="E" <?php echo e($agen->nilai->matematika == 'E' ? 'selected' : ''); ?>>E
                                    </option>
                                </select>
                                <?php $__errorArgs = ['matematika'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="ilmu_pengetahuan_alam"
                                    class="form-select form-control <?php $__errorArgs = ['ilmu_pengetahuan_alam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="ilmu_pengetahuan_alam" required>
                                    <option value="E" disabled <?php echo e($agen->nilai->ilmu_pengetahuan_alam == 'E' ? 'selected' : ''); ?>>Pilih nilai A-E</option>
                                    <option value="A" <?php echo e($agen->nilai->ilmu_pengetahuan_alam == 'A' ? 'selected' : ''); ?>>A</option>
                                    <option value="B" <?php echo e($agen->nilai->ilmu_pengetahuan_alam == 'B' ? 'selected' : ''); ?>>B</option>
                                    <option value="C" <?php echo e($agen->nilai->ilmu_pengetahuan_alam == 'C' ? 'selected' : ''); ?>>C</option>
                                    <option value="D" <?php echo e($agen->nilai->ilmu_pengetahuan_alam == 'D' ? 'selected' : ''); ?>>D</option>
                                    <option value="E" <?php echo e($agen->nilai->ilmu_pengetahuan_alam == 'E' ? 'selected' : ''); ?>>E</option>
                                </select>
                                <?php $__errorArgs = ['ilmu_pengetahuan_alam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="bahasa_indonesia"
                                    class="form-select form-control <?php $__errorArgs = ['bahasa_indonesia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="bahasa_indonesia" required>
                                    <option value="E" disabled <?php echo e($agen->nilai->bahasa_indonesia == 'E' ? 'selected' : ''); ?>>Pilih nilai A-E</option>
                                    <option value="A" <?php echo e($agen->nilai->bahasa_indonesia == 'A' ? 'selected' : ''); ?>>A</option>
                                    <option value="B" <?php echo e($agen->nilai->bahasa_indonesia == 'B' ? 'selected' : ''); ?>>B</option>
                                    <option value="C" <?php echo e($agen->nilai->bahasa_indonesia == 'C' ? 'selected' : ''); ?>>C</option>
                                    <option value="D" <?php echo e($agen->nilai->bahasa_indonesia == 'D' ? 'selected' : ''); ?>>D</option>
                                    <option value="E" <?php echo e($agen->nilai->bahasa_indonesia == 'E' ? 'selected' : ''); ?>>E</option>
                                </select>
                                <?php $__errorArgs = ['bahasa_indonesia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="test_membaca_al_quran"
                                    class="form-select form-control <?php $__errorArgs = ['test_membaca_al_quran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="test_membaca_al_quran" required>
                                    <option value="E" disabled <?php echo e($agen->nilai->test_membaca_al_quran == 'E' ? 'selected' : ''); ?>>Pilih nilai A-E</option>
                                    <option value="A" <?php echo e($agen->nilai->test_membaca_al_quran == 'A' ? 'selected' : ''); ?>>A</option>
                                    <option value="B" <?php echo e($agen->nilai->test_membaca_al_quran == 'B' ? 'selected' : ''); ?>>B</option>
                                    <option value="C" <?php echo e($agen->nilai->test_membaca_al_quran == 'C' ? 'selected' : ''); ?>>C</option>
                                    <option value="D" <?php echo e($agen->nilai->test_membaca_al_quran == 'D' ? 'selected' : ''); ?>>D</option>
                                    <option value="E" <?php echo e($agen->nilai->test_membaca_al_quran == 'E' ? 'selected' : ''); ?>>E</option>
                                </select>
                                <?php $__errorArgs = ['test_membaca_al_quran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Kelulusan</td>
                        <td>
                            <select name="status" class="form-select form-control" required disabled>
                                <option selected disabled value="<?php echo e($agen->nilai->status); ?>"><?php echo e($agen->nilai->status); ?>

                                </option>
                                
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success btn-block" type="submit">Submit nilai</button>
        </form>
    </div>

    
    <a href="/agen" class="btn btn-primary btn-block">Kembali ke dashboard</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/agen/nilai.blade.php ENDPATH**/ ?>