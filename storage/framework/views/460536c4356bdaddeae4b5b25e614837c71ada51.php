<?php if(session()->has('success')): ?>
    <div class="alert alert-dismissible text-center alert-success margin-0">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e(session()->get('success')); ?></strong>
    </div>
<?php endif; ?>
<?php /**PATH /home/onpeqomeg1ob/public_html/resources/views/client/_partial/success.blade.php ENDPATH**/ ?>