<?php $__env->startSection('title' , 'Edit Restaurant ' . $restaurant->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card m-t-35 m-b-35">
            <div class="card-header">
                Update Restaurant  <?php echo e($restaurant->name); ?>

            </div>
            <?php echo $__env->make('admin.layout._partial._successLogout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-body card-block">
                <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Restaurant Contract Link 
                                <?php if(\App\Model\ContractRestaurant::select('approve_at')->where('res_id' , $restaurant->id)->first()->approve_at != NULL): ?>
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                <?php endif; ?>
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name"
                                   class="form-control" disabled 
                                   value="<?php echo e(route('contact-page' , \App\Model\ContractRestaurant::select('hash')->where('res_id' , $restaurant->id)->first()->hash)); ?>" >
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
                <form action="<?php echo e(route('restaurant.update' , $restaurant->id)); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Restaurant Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Please Enter Name"
                                   class="form-control" value="<?php echo e($restaurant->name); ?>" required>
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="type_food" class=" form-control-label">Type Food</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="type_food" value="<?php echo e($restaurant->type_food); ?>" name="type_food"
                                   placeholder="Please Enter Type Food split each one for comma"
                                   class="form-control" required>
                            <small class="form-text text-muted">italian , arabian , indian</small>
                            <?php $__errorArgs = ['type_food'];
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="manager_number" class=" form-control-label">Manager Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="manager_number" value="<?php echo e($restaurant->manager_number); ?>" name="manager_number"
                                   placeholder="Please Enter the manager number"
                                   class="form-control" >
                            <?php $__errorArgs = ['manager_number'];
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="manager_email" class=" form-control-label">Manager Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="manager_email" value="<?php echo e($restaurant->manager_email); ?>" name="manager_email"
                                   placeholder="Please enter the manager email"
                                   class="form-control" >
                            <?php $__errorArgs = ['manager_email'];
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Phone Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="<?php echo e($restaurant->number); ?>" name="phone"
                                   placeholder="Please Enter Phone number Restaurant"
                                   class="form-control" required>
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
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="9" placeholder="Please Enter Description of Restaurant" class="form-control" required><?php echo e($restaurant->description); ?></textarea>
                            <?php $__errorArgs = ['description'];
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

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="menu" class=" form-control-label">Menu Picture</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="menu" name="menu" class="form-control-file">
                            <small class="form-text text-muted"><strong>Notice : </strong> if you upload new picture of menu then will delete old one and replace it for new one</small>
                            <?php $__errorArgs = ['menu'];
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

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="country" class=" form-control-label">Country</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="country" id="country" class="form-control" required>
                                <option value="<?php echo e($restaurant->country->id); ?>"><?php echo e($restaurant->country->name); ?></option>
                                <?php $__currentLoopData = \App\Model\Country::orderBy('name' , 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['country'];
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control" required>
                                <option value="<?php echo e($restaurant->city->id); ?>"><?php echo e($restaurant->city->name); ?></option>
                            </select>
                            <?php $__errorArgs = ['city'];
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Logmaty</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="<?php if($restaurant->appsDelivery()->exists()): ?> <?php echo e($restaurant->appsDelivery->logmaty); ?> <?php endif; ?>" name="logmaty"
                                   placeholder="Please Enter the url of resturant in logmaty app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Marsool</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="<?php if($restaurant->appsDelivery()->exists()): ?> <?php echo e($restaurant->appsDelivery->mrsool); ?> <?php endif; ?>" name="mrsool"
                                   placeholder="Please Enter the url of resturant in mrsool app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Hunger station</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="<?php if($restaurant->appsDelivery()->exists()): ?> <?php echo e($restaurant->appsDelivery->hungerStation); ?> <?php endif; ?>" name="hungerStation"
                                   placeholder="Please Enter the url of resturant in hunger station app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Jahiz</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="<?php if($restaurant->appsDelivery()->exists()): ?> <?php echo e($restaurant->appsDelivery->jahiz); ?> <?php endif; ?>" name="jahiz"
                                   placeholder="Please Enter the url of resturant in jahiz app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="careemNow" class=" form-control-label">Careem Now</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="careemNow" value="<?php if($restaurant->appsDelivery()->exists()): ?> <?php echo e($restaurant->appsDelivery->careemNow); ?> <?php endif; ?>" name="careemNow"
                                   placeholder="Please Enter the url of resturant in careem Now app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Location in google maps</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="url" id="phone" value="<?php echo e($restaurant->map_url); ?>" name="location"
                                   placeholder="Please Enter url in google maps location Restaurant"
                                   class="form-control" required>
                            <?php $__errorArgs = ['location'];
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
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Save
                    </button>
                </form>
            </div>

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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/LaravelApp/resources/views/admin/restaurant/edit.blade.php ENDPATH**/ ?>