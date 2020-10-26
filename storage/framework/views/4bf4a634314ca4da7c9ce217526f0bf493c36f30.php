<?php $__env->startComponent('mail::message'); ?>

# Hi <?php echo e($reservation->name); ?>


Thank you for booking with **<?php echo e(config('app.name')); ?>**
We Are happy to serve you . <br>
We Are Sorry to Inform you , <br>
Your Reservation in

- Restaurant :  **<?php echo e($reservation->restaurant->name); ?>**
- Booking Number **<?php echo e($reservation->booking_number); ?>**
- Guest **<?php echo e($reservation->person_number); ?>**

has Been **<span class="text-danger">Canceled</span>**

<?php $__env->startComponent('mail::button', ['url' => 'https://www.fnbtime.com/client']); ?>
        Check All Reservation
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Our Regard,<br>
    <?php echo e(config('app.name')); ?>,Team
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/onpeqomeg1ob/LaravelApp/resources/views/emails/client/CancelBooking.blade.php ENDPATH**/ ?>