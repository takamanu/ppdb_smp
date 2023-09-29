

<?php $__env->startSection('container'); ?>
    <h2>Perkembangan Bisnis</h2>

    <div class="card">
        <div class="card-header">
            Summary
        </div>
        <div class="summary d-flex justify-content-evenly">
            <div class="card-body">
                <h5 class="card-title">Saldo dalam bulan <?php echo e($bulan); ?></h5>
                <p class="card-text">Hasil pendapatan bersih dari pemasukan dan pengeluaran pada bulan <?php echo e($bulan); ?>

                    adalah
                </p>
                <h2>
                    <?php if($saldo < 0): ?>
                        <strong>-Rp<?php echo e($saldo * -1); ?></strong>
                    <?php else: ?>
                        <strong>Rp<?php echo e($saldo); ?></strong>
                    <?php endif; ?>
                </h2>
            </div>
            <div class="card text col-5">
                <div class="card-body">
                    <h5 class="card-title">Tambah Transaksi</h5>
                    <p class="card-text">Catat transaksi yang terjadi hari ini.</p>
                    <a href="/transaksi/create" class="btn btn-primary">Tambah Transaksi</a>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <div class="card text-center">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session()->has('fail')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('fail')); ?>

            </div>
        <?php endif; ?>
        <nav class="nav nav-pills nav-fill">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-transaksi-tab" data-bs-toggle="tab" data-bs-target="#nav-transaksi"
                type="button" role="tab" aria-controls="nav-transaksi" aria-selected="true">
                Transaksi
            </button>
            
            <button class="nav-link" id="nav-pemasukan-tab" data-bs-toggle="tab" data-bs-target="#nav-pemasukan"
            type="button" role="tab" aria-controls="nav-pemasukan" aria-selected="true">
                    Pemasukan
                </button>

                <button class="nav-link" id="nav-pengeluaran-tab" data-bs-toggle="tab" data-bs-target="#nav-pengeluaran"
                    type="button" role="tab" aria-controls="nav-pengeluaran" aria-selected="true">
                    Pengeluaran
                </button>
            </div>
        </nav>
        <div class="tab-content" id="new-tabContent">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active p-3" id="nav-transaksi" role="tabpanel"
                    aria-labelledby="nav-transaksi-tab">
                    <h4>Transaksi Penjualan</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jenis Transaksi</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($transaction->id); ?></td>
                                    <td><?php echo e($transaction->created_at); ?></td>
                                    <td><?php echo e($transaction->produk->nama); ?></td>
                                    <td><?php echo e($transaction->user->name); ?></td>
                                    <td><?php echo e($transaction->jenis_transaksi); ?></td>
                                    <td><?php echo e($transaction->jumlah_transaksi); ?></td>
                                    <td><?php echo e($transaction->total_harga); ?></td>
                                    <td>
                                        <a href="/transaksi/<?php echo e($transaction->id); ?>" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/transaksi/<?php echo e($transaction->id); ?>" method="post" class="d-inline">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade p-3" id="nav-pemasukan" role="tabpanel" aria-labelledby="nav-pemasukan-tab">
                    <h4>Pemasukan</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($income->id); ?></td>
                                    <td><?php echo e($income->created_at); ?></td>
                                    <td><?php echo e($income->produk->nama); ?></td>
                                    <td><?php echo e($income->user->name); ?></td>
                                    <td><?php echo e($income->jumlah_transaksi); ?></td>
                                    <td><?php echo e($income->total_harga); ?></td>
                                    <td>
                                        <a href="/transaksi/<?php echo e($income->id); ?>" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/transaksi/<?php echo e($income->id); ?>" method="post" class="d-inline">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade p-3" id="nav-pengeluaran" role="tabpanel" aria-labelledby="nav-pengeluaran-tab">
                    <h4>Pengeluaran</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($expense->id); ?></td>
                                    <td><?php echo e($expense->created_at); ?></td>
                                    <td><?php echo e($expense->produk->nama); ?></td>
                                    <td><?php echo e($expense->user->name); ?></td>
                                    <td><?php echo e($expense->jumlah_transaksi); ?></td>
                                    <td><?php echo e($expense->total_harga); ?></td>
                                    <td>
                                        <a href="/transaksi/<?php echo e($expense->id); ?>" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/transaksi/<?php echo e($expense->id); ?>" method="post" class="d-inline">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/transaksi/bisnis.blade.php ENDPATH**/ ?>