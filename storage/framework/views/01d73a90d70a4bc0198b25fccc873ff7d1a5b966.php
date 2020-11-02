<?php $__env->startSection('title' , isset($res) ? 'All Restaurant' : 'All Users'); ?>
<?php $__env->startSection('content'); ?>
    <div class="section__content section__content--p30 mt-5 mb-5">
        <div class="container-fluid">
            <h2 class="text-center mb-3">All Users Views This Restaurant</h2>
            
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <?php echo isset($users) ? '<th>Email</th>' : ''; ?>

                    </tr>
                    </thead>
                    <tbody id="search-data">
                    <?php if(isset($users)): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($restaurant->id); ?></td>
                            <td><?php echo e($restaurant->name); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DATA TABLE-->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\admin\restaurant\usersRestaurant.blade.php ENDPATH**/ ?>