<?php $__env->startSection('title' , 'success reservation'); ?>
<?php $__env->startSection('content'); ?>

    <!-- start Container Wrapper -->
    <div class="container-wrapper">

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

        <?php if(session('reserve-success')): ?>

            <!-- start hero-header -->
                <div class="hero hero-breadcrumb"
                     style="background-image:url('<?php echo e(asset('asset/FrontEnd')); ?>/images/hero-header/hero-image.png');">

                    <div class="container">

                        <p>You have successfully booked your table at</p>
                        <h1><?php echo e($ResName); ?> Restaurant </h1>

                    </div>

                </div>

                <div class="container pt-10 pb-30">

                    <div class="breadcrumb-wrapper">

                        <ol class="breadcrumb">

                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="active">Reserve successful</li>

                        </ol>

                    </div>

                    <div class="row mt-40 mb-30">

                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                            <div class="alert alert-success alert-icon">

                                <i class="fa fa-check-circle"></i>

                                <h4>Your reservation has been Received On Number
                                    <strong><?php echo e($bookingNumber); ?></strong> We Confirmed To you less than 24
                                    hours</h4>

                            </div>

                            <div class="clear mb-10"></div>

                            <h3>Hello <?php echo e(Auth()->user()->name); ?></h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti et porro
                                sapiente vero. Aliquam at aut delectus deleniti dolores dolorum esse, ex excepturi
                                exercitationem fuga, inventore ipsa iure labore laborum molestiae natus neque nisi nulla
                                numquam odio possimus quasi quibusdam quos rem suscipit totam voluptatibus? Architecto
                                aut blanditiis deleniti ducimus excepturi nesciunt non numquam provident reprehenderit
                                voluptates. Excepturi, repudiandae!</p>

                            <div class="clear mt-30 mb-30" style="border-bottom: 3px double #D9D8D7;"></div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-6 mb-30-xs">

                                    <h5 class="text-primary">Your reservation details</h5>

                                    <ul class="list-with-icon mt-25 mb-0">
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            <?php echo e($date); ?>

                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            <?php echo e($time); ?>

                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i>
                                            <?php echo e($persons); ?>

                                        </li>
                                    </ul>

                                </div>

                                <div class="col-xs-12 col-sm-6">

                                    <h5 class="text-primary">Restaurants details</h5>

                                    <ul class="list-with-icon mt-25 mb-0">
                                        <li>
                                            <i class="fa fa-cutlery"></i>
                                            <h6>
                                                <?php echo e($ResName); ?>

                                            </h6>
                                        </li>
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            <?php echo e($country . ' ' . $city); ?>

                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <?php echo e($ResNumber); ?>

                                        </li>
                                    </ul>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

        </div>

        <!-- start Footer Wrapper -->
        <div class="footer-wrapper scrollspy-footer">
    <?php else: ?>
                <div class="text-center">
                    <h3 class="text-danger">Can't Access This Page Directly Check All Reservation here</h3>
                </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\client\success-reservation.blade.php ENDPATH**/ ?>