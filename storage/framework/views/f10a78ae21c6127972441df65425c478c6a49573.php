<?php $__env->startSection('title' , 'All Booking'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layout._partial._successLogout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">This is Archive for all reservation here</h2>
            <form class="form-header pb-2" action="" method="POST">
                <?php echo csrf_field(); ?>
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all Booking in database ...">
            </form>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>Restaurant</th>
                        <th>booking Number</th>
                        <th>Restaurant phone</th>
                        <th>Restaurant country</th>
                        <th>Restaurant city</th>
                        <th>Customer Phone</th>
                        <th>Guest</th>
                        <th>occasion Date</th>
                        <th>occasion Time</th>
                        <th>Date Booking</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($booking->id); ?></td>
                            <td><?php echo e($booking->name); ?></a></td>
                            <td><?php echo e($booking->restaurant->name); ?></td>
                            <td><?php echo e($booking->booking_number); ?></td>
                            <td><?php echo e($booking->restaurant->number); ?></td>
                            <td><?php echo e($booking->restaurant->country->name); ?></td>
                            <td><?php echo e($booking->restaurant->city->name); ?></td>
                            <td><?php echo e($booking->phone_costumer); ?></td>
                            <td><?php echo e($booking->person_number); ?></td>
                            <td><?php echo e($booking->occasion_date); ?></td>
                            <td><?php echo e($booking->time); ?></td>
                            <td><?php echo e($booking->date_booking); ?></td>
                            <td><?php echo $booking->getStatus(); ?></td>
                            <td>
                                <form action="<?php echo e(route('booking.update', $booking->id)); ?>" class="d-inline-block"
                                      method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('PUT')); ?>

                                    <button
                                        class="btn btn-sm btn-outline-primary">Approved
                                    </button>
                                </form>
                                <form action="<?php echo e(route('booking.destroy' , $booking->id)); ?>" class="d-inline-block"
                                      method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field("DELETE")); ?>

                                    <button class="btn btn-sm btn-outline-danger">
                                        Canceled
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 my-4"><?php echo e($bookings->links()); ?></div>
        </div>
        <!-- END DATA TABLE-->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#search-input').on('keyup', function (e) {
            let searchVal = $(this).val();
            if (searchVal != ' ') {
                $.ajax({
                    url: '<?php echo e(route("search-input-for-allBooking")); ?>',
                    method: 'POST',
                    data: {
                        '_token': "<?php echo e(csrf_token()); ?>",
                        'search': searchVal,
                    },
                    dataType: 'json',
                    success: function (success) {
                        if (success != ' ') {
                            $('tbody').html(success);
                        }
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/LaravelApp/resources/views/admin/booking/allBooking.blade.php ENDPATH**/ ?>