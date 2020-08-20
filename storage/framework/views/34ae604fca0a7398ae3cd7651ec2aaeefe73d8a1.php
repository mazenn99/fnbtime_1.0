<?php if(session()->has('error')): ?>
    <div class="btn text-uppercase btn-outline-danger btn-block my-2" type="text">
        <?php echo e(session()->get('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/onpeqomeg1ob/public_html/mazen.fnbtime.com/resources/views/admin/layout/_partial/_errorLogin.blade.php ENDPATH**/ ?>