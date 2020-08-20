<?php $__env->startSection('title' , 'Login'); ?>
<?php $__env->startSection('content'); ?>
    <!-- start Container Wrapper -->
    <div class="container-wrapper">
        <div class="main-wrapper scrollspy-container">
            <div class="container pt-10 pb-50">

                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Login-Sign up</li>
                    </ol>
                </div>
            </div>
            <div class="container mt-90 login-page-form">
                <h1 class="text-center">
                    <span data-class="login" class="selected-form">Login</span> | <span
                        data-class="signup">Sign up</span>
                </h1>
                <form action="<?php echo e(route('login')); ?>" class="col-lg-offset-4 col-md-offset-4 login" name="login"
                      method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" class="form-control" id="email" placeholder="Your Name required"
                                       name="email" value="<?php echo e(old('email')); ?>" required>
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
                                <label for="password-login">Password : </label>
                                <input type="password" class="form-control" id="password-login"
                                       placeholder="Your Name required"
                                       name="password" required>
                                <?php $__errorArgs = ['password'];
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
                    <button name="login" class="btn btn-primary mb-10">Login</button>
                    <a href="<?php echo e(route('password.request')); ?>">Forget You're Password Click Here</a>
                </form>

                <form action="<?php echo e(route('register')); ?>" class="col-lg-offset-4 col-md-offset-4 signup" name="signup"
                      method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter you're Name"
                                       name="name"
                                       value="<?php echo e(old('name')); ?>" required>
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
                                <label for="email-login">email : </label>
                                <input type="email" class="form-control" id="email-login"
                                       placeholder="Enter you're email"
                                       name="email" value="<?php echo e(old('email')); ?>" required>
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
                                <input type="password" class="form-control" id="password"
                                       placeholder="Enter you're password"
                                       name="password" required>
                                <?php $__errorArgs = ['password'];
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
                                <label for="password_confirmation">Password Confirm : </label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       placeholder="Enter you're password" name="password_confirmation" required>
                                <?php $__errorArgs = ['password_confirmation'];
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
                            <label for="country">country</label>
                            <select id="country" name="country" class="form-control">
                                <option value="0" selected>...</option>
                                <?php $country = \App\Model\Country::orderBy('name')->get();?>
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
                                <input type="number" class="form-control" id="phone" placeholder="Enter you're phone"
                                       name="phone" value="<?php echo e(old('phone')); ?>" required>
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
                    </div>
                    <div class="checkbox-block font-icon-checkbox mb-10">
                        <input class="checkbox" name="subscription" id="filter_cuisine" type="checkbox">
                        <label for="filter_cuisine">Subscription to Our Newsletter ?</label>
                    </div>
                    <button class="btn btn-primary mb-10">Sign-up</button>
                </form>
            </div>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/public_html/mazen.fnbtime.com/resources/views/auth/login.blade.php ENDPATH**/ ?>