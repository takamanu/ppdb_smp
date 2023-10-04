

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>

    <form action="/config/update" method="post">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>
        <div class="container mb-5">
            <table class="table table-striped mb-5">
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
                        <td><input type="date" id="pendaftaran_akun_ppdb_start" name="pendaftaran_akun_ppdb_start"
                                aria-label="pendaftaran_akun_ppdb_start" class="form-control"
                                value="<?php echo e($config->pendaftaran_akun_ppdb_start); ?>"></td>
                        <td><input type="date" id="pendaftaran_akun_ppdb_due" name="pendaftaran_akun_ppdb_due"
                                aria-label="pendaftaran_akun_ppdb_due" class="form-control"
                                value="<?php echo e($config->pendaftaran_akun_ppdb_due); ?>"></td>
                    </tr>
                    <tr>
                        <td>Pengumpulan berkas</td>
                        <td><input type="date" id="pengumpulan_berkas_start" name="pengumpulan_berkas_start"
                                aria-label="pengumpulan_berkas_start" class="form-control"
                                value="<?php echo e($config->pengumpulan_berkas_start); ?>"></td>
                        <td><input type="date" id="pengumpulan_berkas_due" name="pengumpulan_berkas_due"
                                aria-label="pengumpulan_berkas_due" class="form-control"
                                value="<?php echo e($config->pengumpulan_berkas_due); ?>"></td>
                    </tr>
                    <tr>
                        <td>Tes Akademik</td>
                        <td><input type="date" id="test_akademik_start" name="test_akademik_start"
                                aria-label="test_akademik_start" class="form-control"
                                value="<?php echo e($config->test_akademik_start); ?>"></td>
                        <td><input type="date" id="test_akademik_due" name="test_akademik_due"
                                aria-label="test_akademik_due" class="form-control"
                                value="<?php echo e($config->test_akademik_due); ?>"></td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td><input type="date" id="test_baca_al_quran_start" name="test_baca_al_quran_start"
                                aria-label="test_baca_al_quran_start" class="form-control"
                                value="<?php echo e($config->test_baca_al_quran_start); ?>"></td>
                        <td><input type="date" id="test_baca_al_quran_due" name="test_baca_al_quran_due"
                                aria-label="test_baca_al_quran_due" class="form-control"
                                value="<?php echo e($config->test_baca_al_quran_due); ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>Pendaftaran Ulang</td>
                        <td><input type="date" id="pendaftaran_ulang_start" name="pendaftaran_ulang_start"
                                aria-label="pendaftaran_ulang_start" class="form-control"
                                value="<?php echo e($config->pendaftaran_ulang_start); ?>"></td>
                        <td><input type="date" id="pendaftaran_ulang_due" name="pendaftaran_ulang_due"
                                aria-label="pendaftaran_ulang_due" class="form-control"
                                value="<?php echo e($config->pendaftaran_ulang_due); ?>"></td>
                    </tr>
                    <tr>
                        <td>Link WhatsApp</td>
                        <td colspan="2"><input type="name" id="redirect_wa" name="redirect_wa"
                                aria-label="redirect_wa" class="form-control" value="<?php echo e($config->redirect_wa); ?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Pengumuman</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pengumuman" value="0"
                                    id="pengumuman_tutup" <?php echo e(old('pengumuman') == '0' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="pengumuman_tutup">Tutup</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pengumuman" value="1"
                                    id="pengumuman_buka" <?php echo e(old('pengumuman') == '1' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="pengumuman_buka">Buka</label>
                            </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Biaya registrasi</td>
                        <td colspan="2"><input type="name" id="nominal_pembayaran" name="nominal_pembayaran"
                                aria-label="nominal_pembayaran" class="form-control"
                                value="<?php echo e($config->nominal_pembayaran); ?>"></td>
                        
                    </tr>

                </tbody>

            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="3">
                            Midtrans Configuration
                        </th>
                        
                    </tr>
                </thead>
                <tr>
                    <td>Merchant ID</td>
                    <td colspan="2">
                        <input type="name" id="midtrans_merchant_id" name="midtrans_merchant_id"
                                aria-label="midtrans_merchant_id" class="form-control"
                                value="<?php echo e($config->midtrans_merchant_id); ?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>Midtrans Client Key</td>
                    <td colspan="2">
                        <input type="name" id="midtrans_client_key" name="midtrans_client_key"
                        aria-label="midtrans_client_key" class="form-control"
                        value="<?php echo e($config->midtrans_client_key); ?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>Midtrans Server Key</td>
                    <td colspan="2">
                        <input type="name" id="midtrans_server_key" name="midtrans_server_key"
                        aria-label="midtrans_server_key" class="form-control"
                        value="<?php echo e($config->midtrans_server_key); ?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>Midtrans Order ID</td>
                    
                        <td colspan="2">
                            <input type="name" id="order_id_midtrans" name="order_id_midtrans"
                            aria-label="order_id_midtrans" class="form-control"
                            value="<?php echo e($config->order_id_midtrans); ?>">
                        </td>
                    
                    
                </tr>
            </table>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Submit perubahan</a>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/config/edit.blade.php ENDPATH**/ ?>