

<?php $__env->startSection('container'); ?>
    <h2>Ketersediaan Barang</h2>

    <div class="card-body">
        <?php if(session()->has('success')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo e(session('success')); ?>

          </div>
        <?php endif; ?>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Normal</th>
                <th scope="col">Harga Member</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($stock->produk->nama); ?></td>
                    <td><?php echo e($stock->produk->harga); ?></td>
                    <td><?php echo e($stock->produk->harga_member); ?></td>
                    <td><?php echo e($stock->jumlah_barang); ?></td>
                    <td>
                      <a href="/persediaan/<?php echo e($stock->id); ?>" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                      <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <form action="/persediaan/<?php echo e($stock->id); ?>" method="post" class="d-inline">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus produk?')"><i class="bi bi-trash"></i></button>
                      </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/persediaan/stock.blade.php ENDPATH**/ ?>