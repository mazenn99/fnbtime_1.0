<?php echo $__env->make('admin.layout.template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
    <?php echo $__env->make('admin.layout.template.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
        <?php echo $__env->make('admin.layout.template.sidebar.rightSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layout.template.sidebar.leftSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
        <?php echo $__env->make('admin.layout.template.header-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END BREADCRUMB-->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
<?php echo $__env->make('admin.layout.template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
<?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\resources\views\admin\layout\app.blade.php ENDPATH**/ ?>