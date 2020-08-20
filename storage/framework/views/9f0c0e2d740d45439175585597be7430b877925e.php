<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="<?php echo e(route('admin.dashboard')); ?>">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><?php echo $__env->yieldContent('title'); ?></li>
                            </ul>
                        </div>
                        <div class="float-left">
                            <button class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-plus"></i>
                                <a class="text-white" href="<?php echo e(route('restaurant.create')); ?>">Add Restaurant</a>
                            </button>
                            <?php if(Auth::user()->is_admin == 1): ?>
                                <button class="au-btn au-btn-icon au-btn--green">
                                    <i class="zmdi zmdi-plus"></i>
                                    <a class="text-white" href="<?php echo e(route('users.create')); ?>">Add Admin</a>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<?php /**PATH /home/onpeqomeg1ob/public_html/mazen.fnbtime.com/resources/views/admin/layout/template/header-top.blade.php ENDPATH**/ ?>