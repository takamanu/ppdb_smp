

<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Daftar Siswa</h2>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/agen/create')); ?>" class="btn btn-success btn-sm float-left" title="Add New Agen">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Siswa
                        </a>
                        <form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cari" id="cari" placeholder="Cari siswa..."
                                value=<?php echo e($cari); ?>>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'Nama'));?></th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', 'Email'));?></th>
                                        <th>Tanggal Dibuat</th>
                                        
                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $agen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($agen->firstItem() + $key); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        
                                        
                                        
                                        <td>

                                            
                                            <a href="<?php echo e(url('/agen/kelulusan/' . $item->id)); ?>" title="Tambah Kelulusan Siswa"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
                                            <a href="<?php echo e(url('/agen/cetak/' . $item->id)); ?>" title="Cetak Datapokok Siswa">
                                                <button class="btn btn-warning btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            </a>
                                            <a href="<?php echo e(url('/agen/' . $item->id)); ?>" title="Lihat Siswa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            
                                            <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Siswa" onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-8">
                                    Showing <?php echo e($agen->firstItem()); ?> to <?php echo e($agen->lastItem()); ?> of <?php echo e($agen->total()); ?>

                                </div>
                                <div class="col-md-4">
                                    
                                    <?php echo e($agen->links()); ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\OneDrive\Desktop\ppdb_smp\resources\views/agen/index.blade.php ENDPATH**/ ?>