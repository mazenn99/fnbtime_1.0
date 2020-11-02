<?php $__env->startSection('title' , 'Password Reset'); ?>
<?php $__env->startSection('content'); ?>
    <!-- start Container Wrapper -->
    <div class="container-wrapper">

        <div class="main-wrapper scrollspy-container">
            <div class="container pt-10 pb-50">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Forget Password</li>
                    </ol>
                </div>
            </div>

            <div class="container mt-90 login-page-form">
                <h1 class="text-center">Please Enter You're Email</h1>
                <form action="<?php echo e(route('password.email')); ?>" class="col-lg-offset-4 col-md-offset-4"
                      method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <?php if(session('status')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" placeholder="Your Email required"
                                       name="email" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback form-text text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mb-20">Send Password Link</button>
                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/LaravelApp/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>