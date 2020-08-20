<?php $__env->startSection('title' , 'Contact us'); ?>
<?php $__env->startSection('content'); ?>
    <!-- start Container Wrapper -->
    <div class="container-wrapper">


        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <div class="container pt-10 pb-50">

                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>

                <div class="mt-40">

                    <div class="section-title-02 text-center">

                        <h3><span>Contact Us</span></h3>
                        <p>Was are delightful solicitude discovered collecting man day. Resolving neglected sir
                            tolerably
                            but existence conveying for.</p>

                    </div>

                    <h6 class="text-center">Send us a Message</h6>

                    <form action="<?php echo e(route('send-message')); ?>" method="POST" class="col-lg-offset-4 col-md-offset-4">
                        <?php echo $__env->make('client._partial.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" value="<?php echo e(old('name')); ?>" class="form-control"
                                           placeholder="Your Name required" name="name"
                                           required>
                                    <?php $__errorArgs = ['name'];
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
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="<?php echo e(old('email')); ?>"
                                           placeholder="Your Email required"
                                           name="email" required>
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" id="textarea" placeholder='Please enter the message here'
                                              cols="30" rows="10" class="form-control"
                                              required><?php echo e(old('message')); ?></textarea>
                                    <?php $__errorArgs = ['message'];
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
                        </div>

                        <button class="btn btn-primary mb-30">Send Message</button>
                    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/public_html/resources/views/client/contact.blade.php ENDPATH**/ ?>