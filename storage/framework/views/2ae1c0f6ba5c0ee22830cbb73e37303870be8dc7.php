<?php $__env->startSection('title' , "Edit Profile " . \Illuminate\Support\Facades\Auth::user()->name); ?>
<?php $__env->startSection('content'); ?>
    <!-- start Container Wrapper -->
    <div class="container-wrapper">

    <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-breadcrumb" style="background-image:url('<?php echo e(asset('asset/FrontEnd')); ?>images/hero-header/hero-image.png');">

                <div class="container">

                    <h1>Edit You're <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?> Profile</h1>

                </div>

            </div>
            <div class="container pt-10 pb-30">

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Edit Profile</li>

                    </ol>

                </div>
                <form action="<?php echo e(route('edit-profile')); ?>" class="col-lg-offset-4 col-md-offset-4" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="width-50">
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" class="form-control" value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?>" id="name"
                                       placeholder="Enter you're Name" name="name" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">email : </label>
                                <input type="email" class="form-control" value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->email); ?>" id="email-login"
                                       placeholder="Enter you're email" name="email" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">password : </label>
                                <input type="password" class="form-control"  id="password"
                                       placeholder="Leave it if you don't want to change it" name="password">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="country">country</label>
                            <select class="form-control" id="country" name="country" onchange="changeCountry()">
                                <option value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->country->id); ?>"><?php echo e(\Illuminate\Support\Facades\Auth::user()->country->name); ?></option>
                                <?php $country = \App\Model\Country::where('id' , '!=' , \Illuminate\Support\Facades\Auth::user()->country->id)->orderBy('name')->get();?>
                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="text-capitalize"
                                            value="<?php echo e($countries->id); ?>"><?php echo e($countries->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="city">city</label>
                            <select class="form-control" id="city" name="city">
                                <?php $city =\App\Model\City::where('country_id' , \Illuminate\Support\Facades\Auth::user()->country_id)->first();?>
                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                            </select>
                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger"><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">phone : </label>
                                <input type="number" class="form-control" value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->phone); ?>" id="phone"
                                       placeholder="Enter you're phone" name="phone" required>
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger"><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="checkbox-block font-icon-checkbox mb-10">
                        <input class="checkbox" name="subscription" id="filter_cuisine" type="checkbox">
                        <label for="filter_cuisine">Subscription to Our Newsletter ?</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Update!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
<?php $__env->stopSection(); ?>
            <?php $__env->startSection('script'); ?>
                <script>
                    $('#country').change(function () {
                        var countryID = $(this).val();
                        if (countryID > 0) {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo e(url('get-city-list')); ?>",
                                data: {country: countryID, _token: '<?php echo e(csrf_token()); ?>'},
                                success: function (res) {
                                    if (res) {
                                        $("#city").empty();
                                        $.each(res, function (key, value) {
                                            $("#city").append('<option value="' + key + '">' + value + '</option>');
                                        });
                                    } else {
                                        $("#city").empty();
                                    }
                                }
                            });
                        }
                    });
                </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\client\edit.blade.php ENDPATH**/ ?>