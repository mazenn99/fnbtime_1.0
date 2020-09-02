<?php $__env->startSection('title' , 'Dashboard Fnbtime'); ?>
<?php $__env->startSection('content'); ?>
    <section class="statistic">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <?php if(Auth::user()->is_admin == 1): ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item">
                                <a href="<?php echo e(route('users.index')); ?>"><h2 class="number"><?php echo e(\App\User::count()); ?></h2>
                                    <span class="desc">Register User</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <a href="<?php echo e(route('restaurant.index')); ?>"><h2 class="number"><?php echo e(\App\Model\Restaurant::count()); ?></h2>
                                <span class="desc">All Restaurant</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-cutlery"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <a href="<?php echo e(route('booking.index')); ?>">
                                <h2 class="number"><?php echo e(\App\Model\Booking::where('status' , 0)->count()); ?></h2>
                                <span class="desc">Last Booking</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-key"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <a href="<?php echo e(route('allBooking')); ?>">
                                <h2 class="number"><?php echo e(\App\Model\Booking::count()); ?></h2>
                                <span class="desc">All Booking</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-key"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END STATISTIC-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/LaravelApp/resources/views/admin/index.blade.php ENDPATH**/ ?>