<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>NISN</th>
        <th>Status Bayar</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $agen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->email); ?></td>
            <td><?php echo e($item->nisn); ?></td>
            <td><?php echo e($lulus); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/agen/allsiswabayar.blade.php ENDPATH**/ ?>