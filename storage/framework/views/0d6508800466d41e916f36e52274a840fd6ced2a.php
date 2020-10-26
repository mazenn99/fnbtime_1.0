<?php $__env->startSection('title' , 'Users'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layout._partial._successLogout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">You Can [Edit - Update - Delete] All Users</h2>
            <form class="form-header pb-2" action="" method="POST">
                <?php echo csrf_field(); ?>
                <input id="search-input" class="au-input au-input--xl form-control" type="text" name="search"
                       placeholder="Search for all Users in database ...">
            </form>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>email</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>country</th>
                        <th>city</th>
                        <th>subscription</th>
                        <th>Verified</th>
                        <th class="text-right">Register At</th>
                        <th class="text-right">All Booking</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><a href="<?php echo e(route('spicific-users' , $user->id)); ?>" target="_blank"><?php echo e($user->email); ?></a></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->phone); ?></td>
                            <td><?php echo e($user->country->name); ?></td>
                            <td><?php echo e($user->city->name); ?></td>
                            <td><?php echo $user->getSubscription(); ?></td>
                            <td><?php echo $user->getVerified(); ?></td>
                            <td><?php echo e($user->created_at); ?></td>
                            <td><?php echo e(\App\Model\Booking::where('user_id' , $user->id)->count()); ?></td>
                            <td>
                                <a href="<?php echo e(route('users.edit' , $user->id)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="<?php echo e(route('users.destroy' , $user->id)); ?>" method="POST"
                                      class="d-inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
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
        </div>
        <!-- END DATA TABLE-->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#search-input').on('keyup', function (e) {
            e.preventDefault();
            let searchVal = $(this).val();
            if (searchVal != ' ') {
                $.ajax({
                    url: '<?php echo e(route("search-input-users")); ?>',
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


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/LaravelApp/resources/views/admin/users/index.blade.php ENDPATH**/ ?>