<?php if(session()->has('success')): ?>
    <div class="btn text-uppercase btn-lg btn-outline-success btn-block" type="text">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\fnbtime-laravel\fnbtime\resources\views/admin/layout/_partial/_successLogout.blade.php ENDPATH**/ ?>