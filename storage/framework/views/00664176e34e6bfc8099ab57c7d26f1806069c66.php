<?php $__env->startSection('title' , 'Restaurant'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layout._partial._successLogout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">You Can [Edit - Update - Delete] All Restaurant</h2>
            <form class="form-header pb-2" action="" method="POST">
                <?php echo csrf_field(); ?>
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all restaurant in database ...">
            </form>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>country</th>
                        <th>city</th>
                        <th>Manager Number</th>
                        <th>Manager Email</th>

                        <th>Restaurant number</th>
                        <th>Added At</th>
                        <th>All Booking</th>
                        <th>All Visitors</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody id="search-data">
                    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($restaurant->id); ?></td>
                            <td><a href="<?php echo e(route('users_restaurant.show' , $restaurant->id)); ?>" target='_blank'><?php echo e($restaurant->name); ?></a></td>
                            <td><?php echo e($restaurant->country->name); ?></td>
                            <td><?php echo e($restaurant->city->name); ?></td>
                            <td><?php echo $restaurant->manager_number ?? '<span class="text-danger">No Number</span>'; ?></td>
                            <td><?php echo $restaurant->manager_email ?? '<span class="text-danger">No Email</span>'; ?></td>

                            <td><?php echo e($restaurant->number); ?></td>
                            <td><?php echo e($restaurant->created_at); ?></td>
                            <td><?php echo e(\App\Model\Booking::where('res_id' , $restaurant->id)->count()); ?></td>
                            <td><?php echo e($restaurant->views); ?></td>
                            <td>
                                <a href="<?php echo e(route('restaurant.edit' , $restaurant->id)); ?>"
                                   class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="<?php echo e(route('restaurant.destroy' , $restaurant->id)); ?>" method="POST"
                                      class="d-inline-block">
                                    <?php echo e(method_field('delete')); ?>

                                    <?php echo csrf_field(); ?>
                                    <button onclick="return confirm('Are You Sure')"
                                            class="btn btn-sm btn-outline-danger">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 my-4"><?php echo e($restaurants->links()); ?></div>
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
                    url: '<?php echo e(route("search-input-restaurants")); ?>',
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\admin\restaurant\index.blade.php ENDPATH**/ ?>