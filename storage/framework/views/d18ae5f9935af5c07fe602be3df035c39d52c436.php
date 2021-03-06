
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/taras-d/images-grid/src/images-grid.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title' , $res->name); ?>
<?php $__env->startSection('content'); ?>



    <!-- start Container Wrapper -->
    <div class="container-wrapper">

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-detail"
                 style="background-image:url('<?php echo e(asset('asset/FrontEnd')); ?>/images/hero-header/hero-image.png');">

                <div class="container">

                    <div class="hero-detail-inner">

                        <div id="detail-content-sticky-nav-00" class="hero-detail-bottom">

                            <div class="GridLex-grid-bottom">

                                <div class="GridLex-col-8_sm-7_xs-12_xss-12">
                                    <div class="detail-header">
                                        <div class="detail-header-inner">
                                            <h3 style="display: inline-block"><?php echo e($res->name); ?></h3>
                                            <p class="location"><i
                                                    class="fa fa-map-marker"></i> <?php echo e($res->country->couName); ?>

                                                <span> </span> <?php echo e($res->city->citName); ?></p>
                                            <div class="rating-wrapper">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(auth()->guard()->check()): ?>
                                    <div class="GridLex-col-4_sm-4_xs-12_xss-12">
                                        <div class="text-right text-left-xs">
                                            <div class="btn-holder mt-5">
                                                <button class="btn btn-light anchor-alt" data-value="<?php echo e($res->id); ?>"
                                                        id="favorite">
                                                        <?php if(\App\Model\Favorite::where('user_id' , \Illuminate\Support\Facades\Auth::id())
                                                                                ->where('res_id' , $res->id)->count()): ?>
                                                        <?php echo e('Saved'); ?>

                                                        <?php else: ?>
                                                            <?php echo e('Added To Favorite'); ?>

                                                        <?php endif; ?>
                                                    <i class="fa fa-heart ml-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-10 pb-50">

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Restaurant detail</li>

                    </ol>

                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-8 col-md-9 mb-30">

                        <div class="multiple-sticky for-detail-page">

                            <div class="multiple-sticky-inner">

                                <div class="multiple-sticky-container container">

                                    <div class="multiple-sticky-item clearfix">

                                        <ul id="top-menu" class="multiple-sticky-nav clearfix">
                                            <li>
                                                <a href="#detail-content-sticky-nav-00">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#detail-content-sticky-nav-02">Review</a>
                                            </li>
                                         

                                            <li>
                                                <a href="#detail-content-sticky-nav-01">Menu</a>
                                            </li>

                                            <li>
                                                <a href="#detail-content-sticky-nav-03">Photo</a>
                                            </li>
                                           
                                            <li>
                                                <a href="#detail-content-sticky-nav-04">Location</a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="clear mb-40"></div>

                        <div class="detail-content-for-sticky-menu for-detail-page">

                            <div class="detail-content-section clearfix">

                                <div class="section-title-02">
                                    <h3><span>Overview</span></h3>
                                </div>

                                <p class="font500" id="rdescription"></p>


                                <div class="driver-icon section-title">
                                    <div class="section-title-02">
                                        <h3><span>support in</span></h3>
                                    </div>

                                    <?php if(!empty($res->appsDelivery->mrsool)): ?>
                                        <a href="<?php echo e($res->appsDelivery->mrsool); ?>"
                                           target="_blank"><img src="<?php echo e(asset('asset/FrontEnd')); ?>/images/mrsool.png"></a> 
                                    <?php endif; ?>

                                    <?php if(!empty($res->appsDelivery->logmaty)): ?>
                                        <a href="<?php echo e($res->appsDelivery->logmaty); ?>"
                                           target="_blank"><img src="<?php echo e(asset('asset/FrontEnd')); ?>/images/logmaty.png"></a> 
                                    <?php endif; ?>

                                    <?php if(!empty($res->appsDelivery->hungerStation)): ?>
                                        <a href="<?php echo e($res->appsDelivery->hungerStation); ?>"
                                           target="_blank"><img
                                                src="<?php echo e(asset('asset/FrontEnd')); ?>/images/hungerstation.png"></a> 
                                    <?php endif; ?>

                                    <?php if(!empty($res->appsDelivery->jahiz)): ?>
                                        <a href="<?php echo e($res->appsDelivery->jahiz); ?>"
                                           target="_blank"><img src="<?php echo e(asset('asset/FrontEnd')); ?>/images/jahiz.png"></a> 
                                    <?php endif; ?>

                                    <?php if(!empty($res->appsDelivery->careemNow)): ?>
                                        <a href="<?php echo e($res->appsDelivery->careemNow); ?>"
                                           target="_blank"><img src="<?php echo e(asset('asset/FrontEnd')); ?>/images/careemNow.png"></a>
                                    <?php endif; ?>

                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-6 mb-20">

                                        <div class="contact-box">

                                            <h5 class="text-primary">Contact Information</h5>


                                            <ul class="contact-list"></ul>

                                            <a href="#" target="_blank" class="btn btn-primary btn-sm anchor-alt">See map &amp; get route</a>
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-6">

                                        <div class="open-time-box">

                                            <h5 class="text-primary">Opening Time</h5>

                                            <ul class="open-time-list"></ul>

                                        </div>

                                    </div>

                                </div>

                            </div>


                             <div id="detail-content-sticky-nav-02" class="detail-content-section clearfix">
                                <div class="section-title-02">
                                    <h3><span>Review</span></h3>
                                </div>
                                <div class="review-wrapper">
                                    <div class="review-header">
                                        <div class="GridLex-gap-30">
                                            <div class="GridLex-grid-middle">
                                                <div class="GridLex-col-4_sm-5_xs-12">
                                                    <div class="average-score"></div> <!-- rating and review values are added here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-item-wrapper">
                                        <ul class="review-item-list"></ul> <!-- user reviews are added here -->
                                    </div>
                                </div>
                                <div class="clear mb-15"></div>
                            </div>
                            
                            <div id="detail-content-sticky-nav-01" class="detail-content-section clearfix">

                                <div class="section-title-02">
                                    <h3><span>Menu</span></h3>
                                </div>

                                <div class="tab-style-01-wrapper mt-30 mb-20">

                                    <div class="tab-content">

                                        <div class="tab-pane fade in active" id="tab-style-01-01s">

                                            <div class="tab-inner">

                                                <div class="food-menu-wrapper">

                                                    <div class="GridLex-gap-30">

                                                            <div class="btn-holder mt-5">
                                                                <a href="<?php echo e(asset('images/res-images/menu') . '/' . $res->menu); ?>"
                                                                   class="btn btn-primary " target="_blank"><i class="fa fa-bars mr-3" aria-hidden="true"></i>Click to see Menu</a>
                                                            </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                </div>

                            </div>

                            <div id="detail-content-sticky-nav-03" class="detail-content-section clearfix">

                                <div class="section-title-02">
                                    <h3><span>Photo</span></h3>
                                </div>

                                <div id="detail-food-photo"></div>

                                <div class="clear mb-15"></div>

                            </div>

                            <div id="detail-content-sticky-nav-04" class="detail-content-section clearfix">
                                <div class="section-title-02">
                                    <h3><span>Location</span></h3>
                                </div>
                                <div class="map-holder">
                                    <!-- map -->
                                    <div id="hotel-detail-map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 480px;"></div>
                                </div>
                            </div>

                        </div>

                        <div class="multiple-sticky">
                            <div class="hidden">is used to stop multi-sticky</div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3">

                        <div class="deal-sm clearfix mt-10">


                        </div>

                        <div class="reserve-box mt-30">

                            <h5 class="text-center">Reserve your table</h5> <!-- add class text-center -->
                            <div class="form-wrapper">
                                <form method="POST" action="<?php echo e(route('reserve' , $res->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12">

                                            <div class="input-group mb-15">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" name="FullName" placeholder="Full Name"
                                                       class="form-control" value="<?php echo e(old('FullName')); ?>" required/>
                                                <?php $__errorArgs = ['FullName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="input-group mb-15">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="email" name="email" placeholder="Email Address"
                                                       class="form-control" value="<?php echo e(old('email')); ?>" required/>
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="input-group mb-15">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-earphone"></i></span>
                                                <input type="text" name="phone" placeholder="Phone Number"
                                                       class="form-control" value="<?php echo e(old('phone')); ?>" required/>
                                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="input-group mb-15">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="date" name="date" placeholder="dd/mm/yyyy"
                                                       class="form-control" value="<?php echo e(old('date')); ?>" required/>
                                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="row gap-15">

                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="input-group mb-15">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-time"></i></span>
                                                        <input type="time" name="time" placeholder="hh-mm"
                                                               class="form-control" value="<?php echo e(old('time')); ?>" required/>

                                                        <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                    </div>

                                                </div>

                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="input-group mb-15">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-male"></i></span>
                                                        <input type="number" name="persons" placeholder="Persons"
                                                               class="form-control" value="<?php echo e(old('persons')); ?>"
                                                               required/>
                                                        <?php $__errorArgs = ['persons'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                </div>
                                                <div class="working-status"></div>
                                            </div>
                                            
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(@auth::user()->hasVerifiedEmail()): ?>
                                                    <div class="text-center">
                                                        <button class="btn btn-primary btn-block">Reserve now</button>
                                                    </div>
                                                <?php else: ?>
                                                    <p class='text-center text-capitalize text-danger'>Please Verify
                                                        You're Email</p>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if(auth()->guard()->guest()): ?>
                                                <p class='text-primary text-center'><a href='<?php echo e(route('login')); ?>'
                                                                                       target='_blank'>Please
                                                        Register or login</a></p>
                                            <?php endif; ?>


                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>


                    </div>

                </div>

                
                <div class="row mt-30 container">

                    <div class="col-md-12">

                        <div class="section-title-02">

                            <h3><span>You may also like</span></h3>

                        </div>

                    </div>

                </div>

                <div class="GridLex-gap-30 container">

                    <div class="GridLex-grid-noGutter-equalHeight"></div> <!-- other restaurants in same city are added here -->
                </div>

            </div>

        </div>
    </div>

    <!-- start Footer Wrapper -->
    <div class="footer-wrapper scrollspy-footer">
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('script'); ?>

            <script type="text/javascript" src="<?php echo e(asset('asset/FrontEnd')); ?>/js/map/restaurant_script.js"></script>

            <script type="text/javascript" src="<?php echo e(asset('asset/FrontEnd')); ?>/js/images-grid.js"></script>
            <script defer type="text/javascript" src="<?php echo e(asset('asset/FrontEnd')); ?>/js/infobox.js"></script>
            <!-- load the images to the slider -->
            <?php if(auth()->guard()->check()): ?>
            <script>
                $('#favorite').on('click' , function(e) {
                    let btnVal = $(this).data('value');
                    if(btnVal != 0) {
                        $.ajax({
                            url : '<?php echo e(route("favorite")); ?>',
                            method : 'POST',
                            data : {
                                '_token' : "<?php echo e(csrf_token()); ?>",
                                'value' : btnVal,
                            } ,
                            success:function(success) {
                                if(success == 200) {
                                    $('#favorite').text('Saved')
                                } else {
                                    $('#favorite').text('Not saved')
                                }
                            }
                        });
                    }
                });
            </script>
            <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\client\restaurant-info.blade.php ENDPATH**/ ?>