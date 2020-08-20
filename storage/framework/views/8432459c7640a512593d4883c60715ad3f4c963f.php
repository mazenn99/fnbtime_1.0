<header id="header">
    <!-- start Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top ">

        <div class="header-inner">

            <div class="navbar-header">
                <a class="navbar-brand hidden-xs" href="<?php echo e(route('home')); ?>"><img id="logo-img"
                                                                                src="<?php echo e(asset('FrontEnd')); ?>/images/logo_only.svg"
                                                                                alt="Image"/></a>
                <a class="navbar-brand visible-xs" href="<?php echo e(route('home')); ?>"><img id="logo-img"
                                                                                 src="<?php echo e(asset('FrontEnd')); ?>/images/logo_only.svg"
                                                                                 alt="Image"/></a>
            </div>

            <div id="navbar" class="collapse navbar-collapse navbar-arrow pull-left">

                <ul class="nav navbar-nav" id="responsive-menu">
                    <li>
                        <a href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('restaurant')); ?>">Restaurant</a>
                    </li>
                    <li><a href="<?php echo e(route('contact-us')); ?>">Contact</a></li>
                    <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                </ul>
            </div><!--/.nav-collapse -->

            <div class="pull-right">
                <div class="navbar-mini">
                    <ul class="clearfix">
                        <li class="user-action">
                        <?php if(Auth()->check()): ?>
                            <li class="dropdown bt-dropdown-click">
                                <a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <?php if(!empty(Auth()->user()->email_verified_at)): ?>
                                        <i class="fa fa-check" data-toggle="tooltip" data-placement="bottom"
                                           title="You're Account Is verify"
                                           style="margin-right: 2px;background-color: #27ae60;padding: 3px 5px;color: #FFF;border-radius: 50%;;"></i>
                                    <?php else: ?>
                                        <i class="fa fa-close" data-toggle="tooltip" data-placement="bottom"
                                           title="You're Account Isn't verify"
                                           style="margin-right: 2px;background-color: #c0392b;padding: 3px 5px;color: #FFF;border-radius: 50%;;"></i>
                                    <?php endif; ?>
                                    <i class="fa fa-user mr-5"></i>
                                    <?php echo e(Auth()->user()->name); ?>

                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                                    <li><a href="<?php echo e(route('client-info')); ?>">My Profile</a></li>
                                    <li><a href="<?php echo e(route('edit-profile')); ?>">Edit Profile</a></li>
                                <li>

                                        <a href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>


                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-inverse btn-sm">Sign up/in</a>
                            </li>
                        <?php endif; ?>

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                    </ul>
                </div>
            </div>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
    <!-- end Navbar -->

</header>
<!-- end Header -->

<?php /**PATH C:\xampp\htdocs\fnbtime-LARAVEL-master\resources\views/layouts/template/navbar.blade.php ENDPATH**/ ?>