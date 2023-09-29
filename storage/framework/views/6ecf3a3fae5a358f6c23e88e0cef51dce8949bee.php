

<?php $__env->startSection('container'); ?>
<div class="card">
    <div class="card-header">Lihat Siswa <?php echo e($agen->nama_lengkap); ?></div>
        <!-- Section 1: Data Pribadi -->
        <div class="card-body">
            <h3 class="mb-3">Data Pribadi</h3>
            <div class="row">
                <div class="col-md-4"><b>Nama Lengkap</b></div>
                <div class="col-md-8"><?php echo e($agen->nama_lengkap); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>NISN</b></div>
                <div class="col-md-8"><?php echo e($agen->nisn); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Email</b></div>
                <div class="col-md-8"><?php echo e($agen->email); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Jenis Kelamin</b></div>
                <div class="col-md-8"><?php echo e($agen->jenis_kelamin); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Tempat Lahir</b></div>
                <div class="col-md-8"><?php echo e($agen->tempat_lahir); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Tanggal Lahir</b></div>
                <div class="col-md-8"><?php echo e($agen->tanggal_lahir); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Agama</b></div>
                <div class="col-md-8"><?php echo e($agen->agama); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Asal Sekolah</b></div>
                <div class="col-md-8"><?php echo e($agen->asal_sekolah); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Alamat Sekolah</b></div>
                <div class="col-md-8"><?php echo e($agen->alamat_sekolah); ?></div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4"><b>Jumlah Hafalan</b></div>
                <div class="col-md-8"><?php echo e($agen->jumlah_hafalan); ?></div>
            </div>

            <!-- Section 2: Informasi Keluarga -->
            <h3 class="mb-3">Informasi Keluarga</h3>
            <div class="row">
                <div class="col-md-4"><b>Nama Ayah</b></div>
                <div class="col-md-8"><?php echo e($agen->nama_ayah); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Pekerjaan Ayah</b></div>
                <div class="col-md-8"><?php echo e($agen->pekerjaan_ayah); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Penghasilan Ayah</b></div>
                <div class="col-md-8"><?php echo e($agen->penghasilan_ayah); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Pendidikan Terakhir Ayah</b></div>
                <div class="col-md-8"><?php echo e($agen->pendidikan_terakir_ayah); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>No. WhatsApp Ayah</b></div>
                <div class="col-md-8"><?php echo e($agen->no_wa_ayah); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Nama Ibu</b></div>
                <div class="col-md-8"><?php echo e($agen->nama_ibu); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Pekerjaan Ibu</b></div>
                <div class="col-md-8"><?php echo e($agen->pekerjaan_ibu); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Penghasilan Ibu</b></div>
                <div class="col-md-8"><?php echo e($agen->penghasilan_ibu); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Pendidikan Terakhir Ibu</b></div>
                <div class="col-md-8"><?php echo e($agen->pendidikan_terakir_ibu); ?></div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4"><b>No. WhatsApp Ibu</b></div>
                <div class="col-md-8"><?php echo e($agen->no_wa_ibu); ?></div>
            </div>

             <!-- Section 3: Data Wali Siswa -->
            <h3 class="mb-3">Data Wali Siswa</h3>
            <div class="row">
                <div class="col-md-4"><b>Nama Wali Siswa</b></div>
                <div class="col-md-8"><?php echo e($agen->nama_wali_siswa); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Hubungan dengan Siswa</b></div>
                <div class="col-md-8"><?php echo e($agen->hubungan_dengan_siswa); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Alamat Wali Siswa</b></div>
                <div class="col-md-8"><?php echo e($agen->alamat_wali_siswa); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Pekerjaan Wali</b></div>
                <div class="col-md-8"><?php echo e($agen->pekerjaan_wali); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Penghasilan Wali</b></div>
                <div class="col-md-8"><?php echo e($agen->penghasilan_wali); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Pendidikan Terakhir Wali</b></div>
                <div class="col-md-8"><?php echo e($agen->pendidikan_terakir_wali); ?></div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4"><b>No. WhatsApp Wali Siswa</b></div>
                <div class="col-md-8"><?php echo e($agen->no_wa_wali_siswa); ?></div>
            </div>

            <!-- Section 4: Lainnya -->
            <h3 class="mb-3">Lainnya</h3>
            <div class="row">
                <div class="col-md-4"><b>Motivasi</b></div>
                <div class="col-md-8"><?php echo e($agen->motivasi); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Daftar Sekolah Lain</b></div>
                <div class="col-md-8">
                    <?php if($agen->daftar_sekolah_lain == 1): ?>
                        Yes
                    <?php else: ?>
                        No
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Nama Sekolah Jika Daftar</b></div>
                <div class="col-md-8"><?php echo e($agen->nama_sekolahnya_jika_daftar); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Informasi Didapatkan Dari</b></div>
                <div class="col-md-8"><?php echo e($agen->informasi_didapatkan_dari); ?></div>
            </div>
            
            <br>
            <div class="row">
                <div class="col">
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-block">Back</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/agen/show.blade.php ENDPATH**/ ?>