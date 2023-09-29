

<?php $__env->startSection('container'); ?>
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard Siswa</h1>
        <h6>Selamat datang, <?php echo e($user->name); ?></h6>
        
    </div>

    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>SMPTQ PANGERAN DIPONEGORO</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-5">Kartu Peserta PPDB SMP TQ Pangeran Diponegoro</h5>
            <div class="row mb-5">
                <div class="col-md-6">
                    <p class="card-text">
                        <img class="img-profile rounded-circle" width="50%" src="<?php echo e(asset(Auth::user()->avatar)); ?>">
                    </p>
                </div>
                <?php if($agen == 'NULL'): ?>
                    <div class="col-md-6">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Nama:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">Belum isi datapokok</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">No. Peserta:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">Belum isi datapokok</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Asal Sekolah:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">Belum isi datapokok</div>
                        </div>
                        </p>
                    </div>
                <?php else: ?>
                    <div class="col-md-6">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Nama:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start"><?php echo e($agen->nama_lengkap); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">No. Peserta:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start"><?php echo e($agen->nisn); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Asal Sekolah:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start"><?php echo e($agen->asal_sekolah); ?></div>
                        </div>
                        </p>
                    </div>
                <?php endif; ?>


            </div>

        </div>
        <div class="card-footer text-body-secondary">
            <button onclick="alert('Coming soon')" class="btn btn-primary btn-block">Cetak profil</a>
        </div>
    </div>

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>Aktivitas Pembayaran & Datapokok</h2>
        </div>
        <div class="card-body p-5">
            
            <div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form class="row g-3" action="<?php echo e(route('payment.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <h5 class="card-title">Pembayaran</h5>
                                <p class="card-text"><button class="btn btn-success btn-sm btn-block"
                                        disabled>Success</button>
                                </p>
                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-primary">
                                    Bayar
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">

                    
                    <?php if($agen == 'NULL'): ?>
                        <div class="card max-card-size">
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><a href="/siswa/create" class="btn btn-danger btn-sm btn-block">Belum
                                        Isi</a></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card max-card-size">
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><button class="btn btn-success btn-sm btn-block"
                                        disabled>Success</button></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>Alur Seleksi</h2>
        </div>
        <div class="card-body p-5">
            
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <?php if($date_now > $config->pendaftaran_akun_ppdb_due): ?>
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <?php else: ?>
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Akun PPDB</h5>
                            <p class="card-text"><?php echo e($config->pendaftaran_akun_ppdb_start); ?> s/d
                                <?php echo e($config->pendaftaran_akun_ppdb_due); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <?php if($date_now > $config->pengumpulan_berkas_due): ?>
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <?php else: ?>
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Pengumpulan berkas</h5>
                            <p class="card-text"><?php echo e($config->pengumpulan_berkas_start); ?> s/d
                                <?php echo e($config->pengumpulan_berkas_due); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <?php if($date_now > $config->test_akademik_due): ?>
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <?php else: ?>
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Tes Akademik</h5>
                            <p class="card-text"><?php echo e($config->test_akademik_start); ?> s/d <?php echo e($config->test_akademik_due); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-around">
                <div class="col">
                    <div class="card max-card-size">
                        <?php if($date_now > $config->test_baca_al_quran_due): ?>
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <?php else: ?>
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Tes Baca Al-Quran</h5>
                            <p class="card-text"><?php echo e($config->test_baca_al_quran_start); ?> s/d
                                <?php echo e($config->test_baca_al_quran_due); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card max-card-size">
                        <?php if($date_now > $config->pendaftaran_ulang_due): ?>
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <?php else: ?>
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Ulang</h5>
                            <p class="card-text"><?php echo e($config->pendaftaran_ulang_start); ?> s/d
                                <?php echo e($config->pendaftaran_ulang_due); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-body-secondary ">
            <a href="<?php echo e(url('/siswa/pengumuman/' . Auth::user()->id)); ?>" class="btn btn-primary btn-block">Cek
                Pengumuman</a>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Using jQuery for simplicity, but you can use plain JavaScript as well
        $(document).ready(function() {

            // var payButton = document.getElementById('pay-button');

            // Add a click event listener to the "Bayar" button
            $('#exampleModal').on('click', '.btn-primary', function() {
                // Hide the current modal
                $('#exampleModal').modal('hide');

                // Show the second modal
                $('#secondModal').modal('show');
            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\OneDrive\Desktop\ppdb_smp\resources\views/siswa/index.blade.php ENDPATH**/ ?>