<tr>
<td class="header">
<a href="<?php echo e($url); ?>" style="display: inline-block;">
    <?php echo e(config('app.name')); ?>

<?php if(trim($slot) === 'Laravel'): ?>
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Fnbtime Logo">
<?php else: ?>
<?php echo e($slot); ?>

<?php endif; ?>
</a>
</td>
</tr>
<?php /**PATH /home/onpeqomeg1ob/public_html/resources/views/vendor/mail/html/header.blade.php ENDPATH**/ ?>