

<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    
                    <div class="card-header">
                        
                        <h2>Daftar Siswa</h2>
                    </div>
                    <div class="card-body">
                        
                        <form method="GET" class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cari" id="cari"
                                    placeholder="Cari siswa..." value=<?php echo e($cari); ?>>
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

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'Nama'));?></th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', 'Email'));?></th>
                                        <th>Status Bayar</th>
                                        <th>Status Datapokok</th>
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
                                            <td>
                                                <?php if($item->payment == '[]'): ?>
                                                    Belum bayar
                                                    
                                                <?php else: ?>
                                                    Selesai bayar
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <?php if(empty($item->datapokok)): ?>
                                                    Belum isi datapokok
                                                <?php elseif(is_null($item->datapokok)): ?>
                                                    Belum isi datapokok
                                                <?php else: ?>
                                                    Isi datapokok
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td><?php echo e($item->created_at); ?></td>
                                            
                                            
                                            
                                            <td>
                                                <?php if(empty($item->datapokok)): ?>
                                                    <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                <?php elseif(is_null($item->datapokok)): ?>
                                                    <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('/agen/nilai/' . $item->id)); ?>"
                                                        title="Tambah Kelulusan Siswa"><button
                                                            class="btn btn-success btn-sm"><i class="fa fa-plus"
                                                                aria-hidden="true"></i></button></a>
                                                    <a href="<?php echo e(url('/agen/cetak/' . $item->id)); ?>"
                                                        title="Cetak Datapokok Siswa">
                                                        <button class="btn btn-warning btn-sm"><i class="fa fa-print"
                                                                aria-hidden="true"></i></button>
                                                    </a>
                                                    <a href="<?php echo e(url('/agen/' . $item->id)); ?>" title="Lihat Siswa"><button
                                                            class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></button></a>
                                                    
                                                    <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="row mb-5">
                                <div class="col-md-8">
                                    Showing <?php echo e($agen->firstItem()); ?> to <?php echo e($agen->lastItem()); ?> of <?php echo e($agen->total()); ?>

                                </div>
                                <div class="col-md-4">
                                    
                                    <?php echo e($agen->links()); ?>

                                </div>
                            </div>
                            <div class="row">
                                <a href="/excel/sudah-bayar" class="btn btn-success btn-block">Daftar siswa Sudah bayar (Download XLSX)</a>
                                <a href="/excel/sudah-lulus" class="btn btn-success btn-block">Daftar siswa Sudah lulus (Download XLSX)</a>
                                <a href="/excel/tidak-lulus" class="btn btn-success btn-block">Daftar siswa Tidak lulus (Download XLSX)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/agen/index.blade.php ENDPATH**/ ?>