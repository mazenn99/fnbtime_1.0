<?php $__env->startSection('title' , 'Add new Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Add New Admin</h3>
                        </div>
                        <?php echo $__env->make('admin.layout._partial._successLogout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <hr>
                        <form action="<?php echo e(route('users.store')); ?>" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id='name' name="name" type="text" placeholder="Type Admin Name"
                                       class="form-control" value="<?php echo e(old('name')); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group has-success">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id='email' name="email" type="email" value="<?php echo e(old('email')); ?>"
                                       placeholder="Type Admin Email" class="form-control cc-name valid" data-val="true"
                                       data-val-required="Please enter the name"
                                       autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                       aria-describedby="cc-name-error">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Password</label>
                                <input id="cc-number" name="password" type="password"
                                       class="form-control cc-number identified visa" value="" data-val="true"
                                       data-val-required="Please enter a valid password"
                                       data-val-cc-number="Please enter a valid password"
                                       autocomplete="cc-number" placeholder="Type Admin Password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Password</label>
                                <input id="cc-number" name="password_confirmation" type="password"
                                       class="form-control cc-number identified visa" value="" data-val="true"
                                       data-val-required="Please enter a valid password"
                                       data-val-cc-number="Please enter a valid password"
                                       autocomplete="cc-number" placeholder="re-write Admin Password">
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbtime-laravel\fnbtime\resources\views/Admin/users/create.blade.php ENDPATH**/ ?>