<?php $__env->startSection('title' , 'Details'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-wrapper">

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-breadcrumb"
                 style="background-image:url('<?php echo e(asset('FrontEnd')); ?>/images/hero-header/hero-image.png');">

                <div class="container">

                    <h1>all <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?> Reservation</h1>

                </div>

            </div>
            <div class="container pt-10 pb-30">

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?> Reservation</li>
                    </ol>

                </div>

                <div class="row mt-40 mb-30 text-center">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="section-title-02 mb-20">

                            <h3><span><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?> Reservation Details</span>
                            </h3>

                        </div>
                        <?php if(\App\Model\Booking::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->count() > 0): ?>
                            <?php $__currentLoopData = \App\Model\Booking::with(['Restaurant' => function($q) {$q->select('name');}])->where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="reservation-summary-wrapper">

                                    <ul class="reservation-summary-list">

                                        <!--<li>-->
                                        <!--    <div class="image">-->
                                        <!--        <?php $img = explode(',', $result->restaurant->picture); ?>-->
                                        <!--        <img src="<?php echo e(asset('images/res-images')); ?>/<?php echo e($img[0]); ?>"-->
                                        <!--             alt="Restaurant image <?php echo e($result->restaurant->name); ?>"/>-->
                                        <!--    </div>-->
                                        <!--</li>-->

                                        <li>
                                            <span class="block text-muted text-uppercase">Restaurant</span>
                                            <h6><a href="<?php echo e(route('res-info' , $result->restaurant->id)); ?>"
                                                   target="_blank"><?php echo e($result->restaurant->name); ?></a></h6>
                                        </li>

                                        <li>
                                            <span class="block text-muted text-uppercase">Date</span>
                                            <h6><?php echo $result->occasion_date ?></h6>
                                        </li>

                                        <li>
                                            <span class="block text-muted text-uppercase">Time</span>
                                            <h6><?php echo $result->time ?></h6>
                                        </li>


                                        <li>
                                            <span class="block text-muted text-uppercase">Guests</span>
                                            <h6><?php echo $result->person_number ?></h6>
                                        </li>

                                        <li>
                                            <span class="block text-muted text-uppercase">Booking Number</span>
                                            <h6><?php echo $result->booking_number ?></h6>
                                        </li>

                                        <li>
                                            <?php echo $result->getStatus(); ?>

                                        </li>

                                    </ul>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php echo "<h4 class='text-center text-danger' style='display: block'>You didn't have any booking yet</h4>";; ?>

                        <?php endif; ?>

                        <div class="submite-list-wrapper">

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="section-title-02 mb-20">

                                        <h3>
                                            <span><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?> Favorite Details</span>
                                        </h3>

                                    </div>

                                </div>

                            </div>
                            <?php if(\App\Model\Favorite::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->count() > 0): ?>
                                <?php $__currentLoopData = \App\Model\Favorite::with(['restaurant' => function($q) {$q->select('id' , 'name' , 'country_id' , 'city_id');}])->where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="reservation-summary-wrapper">

                                        <ul class="reservation-summary-list">

                                            <!--<li>-->
                                            <!--    <div class="image">-->
                                            <!--        <?php $img = explode(',', $result->restaurant->picture); ?>-->
                                            <!--        <img src="<?php echo e(asset('images/res-images')); ?>/<?php echo e($img[0]); ?>"-->
                                            <!--             alt="Restaurant image <?php echo e($result->restaurant->name); ?>"/>-->
                                            <!--    </div>-->
                                            <!--</li>-->

                                            <li>
                                                                            <span
                                                                                class="block text-muted text-uppercase">Restaurant</span>
                                                <h6>
                                                    <h6><a href="<?php echo e(route('res-info' , $result->restaurant->id)); ?>"
                                                           target="_blank"><?php echo e($result->restaurant->name); ?></a></h6>
                                                </h6>
                                            </li>

                                            <li>
                                                                            <span
                                                                                class="block text-muted text-uppercase">Country</span>
                                                <h6><?php echo e($result->restaurant->country->name); ?></h6>
                                            </li>

                                            <li>
                                                                            <span
                                                                                class="block text-muted text-uppercase">City</span>
                                                <h6><?php echo e($result->restaurant->city->name); ?></h6>
                                            </li>
                                            <li>
                                                <form action="" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button id="removeFav" onclick="return confirm('Are You Sure')"
                                                            class="btn btn-primary"
                                                            data-value="<?php echo e($result->restaurant->id); ?>">
                                                        Remove
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php echo "<h4 class='text-center text-danger' style='display: block'>You didn't have any Favorite yet</h4>";; ?>

                            <?php endif; ?>
                        </div>

                    </div>

                </div>

            </div>

            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('script'); ?>
                <script>
                    $('#removeFav').on('click', function (e) {
                        e.preventDefault();
                        let btnVal = $(this).data('value');
                        if (btnVal != 0) {
                            $.ajax({
                                url: '<?php echo e(route("del-fav")); ?>',
                                method: 'POST',
                                data: {
                                    '_token': "<?php echo e(csrf_token()); ?>",
                                    'value': btnVal,
                                },
                                success: function (success) {
                                    if (success == 200) {
                                        location.reload();
                                    }
                                }
                            });
                        }
                    });
                </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/public_html/resources/views/client/client.blade.php ENDPATH**/ ?>