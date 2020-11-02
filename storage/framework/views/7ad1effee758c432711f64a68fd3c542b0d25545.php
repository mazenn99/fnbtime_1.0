<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>CONTRACT - <?php echo e($contract->restaurant->name); ?></title>
        <style>
            .logo {
                display:block;
                margin:10px auto;
            }
        </style>
    </head>
    <body>
        <div class='container border border-dark my-5'>
            <div class='my-4'>
                <?php echo $__env->make('client._partial.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <img class='logo' src='<?php echo e(asset('asset/FrontEnd/images/logo_only.svg')); ?>' width='150px' height='150px'>
            <h1 class="my-3 text-center display-2"><b>CONTRACT <br> AGREEMENT</b></h1>
            <h2 class='text-center'>With - <span class='text-danger'><?php echo e($contract->restaurant->name); ?></span> -  in 
            <?php if($contract->approve_at == NULL): ?>
                <?php echo e(Carbon\Carbon::now()); ?>

                <?php else: ?>
                <?php echo e($contract->approve_at); ?>

            <?php endif; ?>
            </h2>
            <h2>Between</h2>
            <ul class='h3'>
                <li>Fnbtime - Company</li>
                <li><?php echo e($contract->restaurant->name); ?></li>
            </ul>
            <hr>
            <h2 class='text-uppercase'>introduction</h2>
            <p class='lead'>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <hr>
            <h2 class='text-uppercase'>agreement</h2>
            <p class='lead'>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <hr>
            <h2 class='text-uppercase'>Restaurant inforatmion</h2>
            <div class='row my-3'>
                <div class='col-3'>
                    Restaurant name 
                </div>
                
                <div class='col-9'>
                    <?php echo e($contract->restaurant->name); ?>

                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Type Food 
                </div>
                
                <div class='col-9'>
                    <?php echo e($contract->restaurant->type_food); ?>

                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Restaurant number
                </div>
                
                <div class='col-9'>
                    <?php echo e($contract->restaurant->number); ?>

                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Description
                </div>
                
                <div class='col-9'>
                    <?php echo e($contract->restaurant->description); ?>

                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Menu
                </div>
                
                <div class='col-9'>
                    <a class='btn btn-sm btn-outline-primary' href="<?php echo e(asset('images/res-images/menu') . '/' . $contract->restaurant->menu); ?>" target='_blank'>Click to browse</a>
                </div>
            </div>
            <hr>
            <h2 class='text-uppercase'>Support in</h2>
            <div class='row my-3'>
                <div class='col-3'>
                    Logmaty App
                </div>
                <div class='col-9'>
                    <a href='<?php echo e($contract->restaurant->appsDelivery->logmaty); ?>' target='_blank'>Click</a>
                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Mrsool
                </div>
                <div class='col-9'>
                    <a href='<?php echo e($contract->restaurant->appsDelivery->mrsool); ?>' target='_blank'>Click</a>
                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Hungerstation
                </div>
                <div class='col-9'>
                    <a href='<?php echo e($contract->restaurant->appsDelivery->jahiz); ?>' target='_blank'>Click</a>
                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    careemNow
                </div>
                <div class='col-9'>
                    <a href='<?php echo e($contract->restaurant->appsDelivery->hungerStation); ?>' target='_blank'>Click</a>
                </div>
            </div>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Jahiz
                </div>
                <div class='col-9'>
                    <a href='<?php echo e($contract->restaurant->appsDelivery->careemNow); ?>' target='_blank'>Click</a>
                </div>
            </div>
            
            <hr>
            
            <div class='row my-3'>
                <div class='col-3'>
                    Location - photos - times
                </div>
                <div class='col-9'>
                    <a href='<?php echo e($contract->restaurant->map_url); ?>' target='_blank'>Click</a>
                </div>
            </div>
            
            <hr>
            
            <div class='text-center'>
                <h2 class='text-uppercase'>Approved</h2>
            <p class='lead text-danger'>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            </div>
            
            <?php if($contract->approve_at == NULL): ?> 
            <form action="<?php echo e(route('contract-approve')); ?>" method='POST'>
                <?php echo csrf_field(); ?>
                <div class='form-group'>
                    <label for='signedName'>Please Enter Full Name</label>
                    <input id='signedName' type='text' class='form-control' name='signedName' placeholder='Please Enter Your  Full name' required>
                    <?php $__errorArgs = ['signedName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class='form-text text-danger'><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class='row justify-content-center'>
                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="contractChecked" name='contractChecked' required>
                <label class="custom-control-label" for="contractChecked">Agree for Terms && Condition</label>
                <?php $__errorArgs = ['contractChecked'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class='form-text text-danger'><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div> 
              </div>
              <input type='hidden' name='resID' value='<?php echo e($contract->res_id); ?>'>
              <button class='btn btn-outline-danger btn-block mt-3'>Save</button>
              </form>
              <?php else: ?>
              <button class='btn btn-outline-danger btn-block text-uppercase mb-3' type='text'>this contract was approved at <?php echo e($contract->approve_at); ?> By <?php echo e($contract->signed_name); ?></button>
            <?php endif; ?>
            
        </div>
    </body>
</html><?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\client\contract.blade.php ENDPATH**/ ?>