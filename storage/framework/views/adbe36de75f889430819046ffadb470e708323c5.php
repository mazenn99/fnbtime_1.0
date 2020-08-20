<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
    <div class="logo">
        <a href="#">
            <img src="<?php echo e(asset('FrontEnd')); ?>/images/fnbtime-logo.png" alt="fnbtime logo" width="70"/>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="<?php echo e(asset('adminFrontEnd')); ?>/images/avatar/<?php if(!(is_null(Auth::guard('admin')->user()->photo))): ?><?php echo e(Auth::guard('admin')->user()->photo); ?><?php else: ?><?php echo e('empty-avatar.png'); ?> <?php endif; ?>" width="400px" height="400px"/>
            </div>
            <h4 class="name"><?php echo e(Auth::user()->name); ?></h4>
            <form action="<?php echo e(route('logout-admin')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class="btn btn-outline-link btn-sm">Sign out</button>
            </form>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="https://sg2plcpnl0079.prod.sin2.secureserver.net:2096" target="_blank">
                        <i class="fas fa-chart-bar"></i>Mail Box</a>
                </li>
                <li>
                    <a href="<?php echo e(route('restaurant.index')); ?>">
                        <i class="fa fa-cutlery"></i>Restaurant</a>
                </li>

                <li>
                    <a href="<?php echo e(route('dashboard-users')); ?>">
                        <i class="fa fa-users"></i>Users</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-key"></i>Booking
                        <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                    </a>
                    <ul class="list-unstyled open navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?php echo e(route('booking.index')); ?>">
                                <i class="fas fa-table"></i>Last Booking</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('allBooking')); ?>">
                                <i class="far fa-check-square"></i>All Booking</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<?php /**PATH C:\xampp\htdocs\fnbtime-LARAVEL-master\resources\views/admin/layout/template/sidebar.blade.php ENDPATH**/ ?>