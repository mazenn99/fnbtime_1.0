
<?php $__env->startSection('title' , 'Restaurant'); ?>
<?php $__env->startSection('content'); ?>
<<<<<<< HEAD
 <!-- map container which is hidden but needed for geocoding and places api usage -->
    <div class="map-holder" style="display: none;">
        <div id="hotel-detail-map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 480px;"></div>
    </div>
=======
>>>>>>> 20852b4199e0745db89bbf61033394c94e2cef45
    <!-- start Container Wrapper -->
    <div class="container-wrapper">


        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-sm"
                 style="background-image:url('<?php echo e(asset('FrontEnd')); ?>/images/hero-header/hero-image.png');">
                <div class="container">

                    <div class="home-search-form mt-20-xs">

                        <div class="clear"></div>

                        <div class="home-search-form" style="display: inline-block;text-align: center">

                            <form action="<?php echo e(route('searchFrom')); ?>" method="GET">
                                <div class="form-group location-form">
                                    <input type="text" id="search" name="search" class="form-control"
                                           placeholder="What would you like to eat?">

                                </div>

                                <button class="btn btn-primary btn-form">Find a Table</button>

                            </form>

                            <div class="list-group" id="show-list-search" style="display: none;">

                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- end hero-header -->

            <div class="container pt-10 pb-30">

                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Restaurant page</li>
                    </ol>
                </div>

                <div class="row">

                    <div class="col-sm-4 col-md-3">

                        <div class="section-title-02">
                            <h4><span>Filter Your Result</span></h4>
                        </div>


                        <div class="sidebar-module">
                            <h5>Cuisine Type</h5>
                            <form action="#" method="POST">
                                <?php $__currentLoopData = \App\Model\TypeFood::orderBy('name' , 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="checkbox-block font-icon-checkbox">
                                        <input class="filterType checkbox"
                                               id="filter_cuisine-<?php echo e($key+1); ?>"
                                               value="<?php echo e($filter->name); ?>"
                                               name="checkbox"
                                               type="checkbox">
                                        <label for="filter_cuisine-<?php echo e($key+1); ?>"><?php echo e($filter->name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <?php if(request('search')): ?>
                            <?php if($result->total() > 0): ?>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="filter">

                                    </div>
                                    <div class="restaurant-list-item-wrapper no-last-bb"
                                         id="filterTypeCuisineSearch">
                                        <div class="restaurant-list-item clearfix">

                                            <div class="GridLex-grid-noGutter-equalHeight">

                                                <div class="GridLex-col-3_sm-3_xss-12">
                                                    <div
                                                        class="image"> <?php $img = explode(',', $restaurant->picture) ?>
                                                        <img src="<?php echo e(asset('images/res-images')); ?>/<?php echo e($img[0]); ?>"
                                                             alt="Image"/>
                                                    </div>
                                                </div>

                                                <div class="GridLex-col-9_sm-9_xss-12">

                                                    <div class="GridLex-grid-noGutter-equalHeight">

                                                        <div class="GridLex-col-9_sm-12 content-wrapper">

                                                            <div class="content">
                                                                <h5>
                                                                    <a href="<?php echo e(route('res-info' , $restaurant->id)); ?>"><?php echo e($restaurant->name); ?></a>
                                                                </h5>
                                                                <p class="location"><i
                                                                        class="fa fa-map-marker"></i> <?php echo e($restaurant->country->couName); ?>

                                                                    <span> </span> <?php echo e($restaurant->city->citName); ?>

                                                                </p>
                                                                <p class="short-info">
                                                                    <?php if(strlen($restaurant->description) > 40): ?>
                                                                        <?php echo e(substr($restaurant->description, 0, 300)); ?>

                                                                    <?php endif; ?>
                                                                </p>
                                                                <p class="cuisine">
                                                                    
                                                                    Cuisine: <?php $type = explode(',' ,  $restaurant->type_food) ?>
                                                                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <span> <?php echo e($types); ?></span>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="GridLex-col-3_sm-12 meta-wrapper">

                                                            <div class="meta">

                                                                <div class="right-bottom">
                                                                    <a href="<?php echo e(route('res-info' , $restaurant->id)); ?>"
                                                                       class="btn btn-primary btn-sm btn-block">Details</a>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="pagination-wrapper">
                                    <div class="GridLex-grid-middle GridLex-grid-noGutter">
                                        <div class="GridLex-col-6_sm-12_xs-12">
                                            <div class="text-right text-center-sm mb-10-sm">Showing More Restaurant
                                            </div>
                                        </div>
                                        <div class="GridLex-col-6_sm-12_xs-12">
                                            <nav>
                                                <ul class="pagination pagination-text-center-sm mb-5-xs">
                                                    <?php if(isset($result) && count($result) > 0): ?>
                                                        <?php echo e($result->appends(Request::except('page'))->links()); ?>

                                                    <?php else: ?>
                                                        <?php echo e($res->links()); ?>

                                                    <?php endif; ?>
                                                </ul>
                                            </nav>

                                        </div>

                                    </div>

                                </div>
                            <?php else: ?>
                                <div class="text-danger text-center text-capitalize">sorry no data to show <br>
                                    <a href="<?php echo e(route('restaurant')); ?>"
                                       class="text-capitalize btn btn-primary btn-sm text-center">click to show all
                                        restaurant</a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="restaurant-list-item clearfix">

                                    <div class="GridLex-grid-noGutter-equalHeight">

                                        <div class="GridLex-col-3_sm-3_xss-12">
                                            <div
                                                class="image"> <?php $img = explode(',', $restaurant->picture) ?>
                                                <img src="<?php echo e(asset('images/res-images')); ?>/<?php echo e($img[0]); ?>" alt="Image"/>
                                            </div>
                                        </div>

                                        <div class="GridLex-col-9_sm-9_xss-12">

                                            <div class="GridLex-grid-noGutter-equalHeight">

                                                <div class="GridLex-col-9_sm-12 content-wrapper">

                                                    <div class="content">
                                                        <h5>
                                                            <a href="<?php echo e(route('res-info' , $restaurant->id)); ?>"><?php echo e($restaurant->name); ?></a>
                                                        </h5>
                                                        <p class="location"><i
                                                                class="fa fa-map-marker"></i> <?php echo e($restaurant->country->couName); ?>

                                                            <span> </span> <?php echo e($restaurant->city->citName); ?></p>
                                                        <p class="short-info">
                                                            <?php if(strlen($restaurant->description) > 40): ?>
                                                                <?php echo e(substr($restaurant->description, 0, 300)); ?>

                                                            <?php endif; ?>
                                                        </p>
                                                        <p class="cuisine">
                                                            
                                                            Cuisine: <?php $type = explode(',' ,  $restaurant->type_food) ?>
                                                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span> <?php echo e($types); ?></span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </p>
                                                    </div>

                                                </div>

                                                <div class="GridLex-col-3_sm-12 meta-wrapper">

                                                    <div class="meta">

                                                        <div class="right-bottom">
                                                            <a href="<?php echo e(route('res-info' , $restaurant->id)); ?>"
                                                               class="btn btn-primary btn-sm btn-block">Details</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="pagination-wrapper">
                                <div class="GridLex-grid-middle GridLex-grid-noGutter">
                                    <div class="GridLex-col-6_sm-12_xs-12">
                                        <div class="text-right text-center-sm mb-10-sm">Showing More Restaurant</div>
                                    </div>
                                    <div class="GridLex-col-6_sm-12_xs-12">
                                        <nav>
                                            <ul class="pagination pagination-text-center-sm mb-5-xs">
                                                <?php if(isset($result) && count($result) > 0): ?>
                                                    <?php echo e($result->appends(Request::except('page'))->links()); ?>

                                                <?php else: ?>
                                                    <?php echo e($res->links()); ?>

                                                <?php endif; ?>
                                            </ul>
                                        </nav>

                                    </div>

                                </div>

                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

        </div>
        <!-- end Main Wrapper -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <!-- start Footer Wrapper -->
<<<<<<< HEAD
        <script type="text/javascript" src="<?php echo e(asset('FrontEnd')); ?>/js/map/list_script.js"></script>
=======
>>>>>>> 20852b4199e0745db89bbf61033394c94e2cef45
            <script>
                
                $('.filterType').on('click', function (e) {
                    let filterVal = $(this).val();
                    $.ajax({
                        url: '<?php echo e(route('restaurant')); ?>',
                        method: 'POST',
                        data: {
                            '_token': '<?php echo e(csrf_token()); ?>',
                            'filter': filterVal,
                        }, success: function (response) {
                            console.log(response)
                            //document.getElementById('filter').appendChild(response.data);
                        }
                    })
                });
                
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbtime-LARAVEL-master\resources\views/client/restaurant.blade.php ENDPATH**/ ?>