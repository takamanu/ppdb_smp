

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Pembayaran <?php echo e(Auth::user()->name); ?></h2>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <h6>Anda akan melakukan pembayaran sebesar:</h6>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rp</th>
                    <th><?php echo e($config->nominal_pembayaran); ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Terbilang</td>
                    <td><?php echo e($nominal); ?> rupiah</td>
                    
                </tr>
                <tr>
                    <td>Untuk</td>
                    <td>Biaya registrasi PPDB SMPITQ Pangeran Diponegoro</td>
                    
                </tr>
            </tbody>
        </table>
        <button type="button" id="pay-button" class="btn btn-success btn-block">Bayar biaya registrasi</a>

    </div>
    <hr>
    
    <a href="/siswa" class="btn btn-warning btn-block">Kembali ke dashboard</a>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('<?php echo e($snapToken); ?>', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    Swal.fire({
                        icon: 'success',
                        title: 'Pembayaran kamu berhasil!',
                        showConfirmButton: false,
                        timer: 1500 // Display for 3 seconds
                    }).then(function() {
                        // Redirect after 3 seconds
                        window.location.href = "/siswa";
                    });
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\IDE\laragon\www\ppdb_smp\resources\views/siswa/bayar.blade.php ENDPATH**/ ?>