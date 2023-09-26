

<?php $__env->startSection('container'); ?>

    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
        <h6>Selamat datang, <?php echo e($user->name); ?></h6>
        
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengumuman Kelolosan</div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800">
                                <input type="checkbox" data-toggle="toggle">
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa yang mendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h2>NULL</h2>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        

        <!-- Pending Requests Card Example -->
        

    <!-- Content Row -->

    

    <!-- Content Row -->
    

    
    

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js"
        integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var bulan = [
            '<?php echo e($bulanPenjualanSatu); ?>',
            '<?php echo e($bulanPenjualanDua); ?>',
            '<?php echo e($bulanPenjualanTiga); ?>',
            '<?php echo e($bulanPenjualanEmpat); ?>',
            '<?php echo e($bulanPenjualanLima); ?>',
            '<?php echo e($bulanPenjualanEnam); ?>',
        ];

        var tahun = [
            '<?php echo e($tahunPenjualanSatu); ?>',
            '<?php echo e($tahunPenjualanDua); ?>',
            '<?php echo e($tahunPenjualanTiga); ?>',
        ]

        var dataPenjualan = <?php echo e($penjualan); ?>;
        var dataPembelian = <?php echo e($pembelian); ?>;
        var saldoBulan = <?php echo e($saldoBulan); ?>;
        var masukBulan = <?php echo e($masukBulan); ?>;
        var keluarBulan = <?php echo e($keluarBulan); ?>;
        var saldoTahun = <?php echo e($saldoTahun); ?>;
        var masukTahun = <?php echo e($masukTahun); ?>;
        var keluarTahun = <?php echo e($keluarTahun); ?>;

        var barChartData = {
            labels: bulan,
            datasets: [{
                label: 'Penjualan Bulanan',
                backgroundColor: "rgba(0, 0, 255, 0.95)",
                data: dataPenjualan,
            }, {
                label: 'Pembelian Bulanan',
                backgroundColor: "rgba(255, 0, 0, 0.95)",
                data: dataPembelian
            }],
        };

        var barSaldoBulan = {
            labels: bulan,
            datasets: [{
                label: 'Saldo Bulanan',
                backgroundColor: "rgba(0, 255, 0, 0.95)",
                data: saldoBulan
            }, {
                label: 'Pemasukan Bulanan',
                backgroundColor: "rgba(255, 0, 0, 0.95)",
                data: masukBulan
            }, {
                label: 'Pengeluaran Bulanan',
                backgroundColor: "rgba(0, 0, 255, 0.95)",
                data: keluarBulan
            }],
        };

        var barSaldoTahun = {
            labels: tahun,
            datasets: [{
                label: 'Saldo Tahunan',
                backgroundColor: "rgba(0, 255, 0, 0.95)",
                data: saldoTahun
            }, {
                label: 'Pemasukan Tahunan',
                backgroundColor: "rgba(255, 0, 0, 0.95)",
                data: masukTahun
            }, {
                label: 'Pengeluaran Tahunan',
                backgroundColor: "rgba(0, 0, 255, 0.95)",
                data: keluarTahun
            }],
        };

        var ctx = document.getElementById('penjualanChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            option: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Penjualan dan Pembelian Bulanan'
                }
            }
        });

        var ctxDua = document.getElementById('saldoChart').getContext('2d');
        var chartDua = new Chart(ctxDua, {
            type: 'bar',
            data: barSaldoBulan,
            option: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Pemasukan dan Pengeluaran Bulanan'
                }
            }
        });

        var ctxTiga = document.getElementById('saldoChartTahun').getContext('2d');
        var chartTiga = new Chart(ctxTiga, {
            type: 'bar',
            data: barSaldoTahun,
            option: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Pemasukan dan Pengeluaran Tahunan'
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\OneDrive\Desktop\ppdb_smp\resources\views/welcome.blade.php ENDPATH**/ ?>