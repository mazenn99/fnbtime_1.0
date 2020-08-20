<?php $__env->startSection('title' , 'Restaurant'); ?>
<?php $__env->startSection('content'); ?>
    <!-- start Container Wrapper -->
    <div class="map-holder" style="display: none;">
                <div id="hotel-detail-map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 480px;"></div>
    </div>

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
                                                    


                                                <?php $__currentLoopData = \App\Model\TypeFood::orderBy('name' , 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <form action="?sort" method="GET">
                                                        <div class="checkbox-block font-icon-checkbox">
                                                            <input class="filterType checkbox" id="<?php echo e($filter->name); ?>" value="<?php echo e($filter->name); ?>"  type="checkbox">
                                                            <label for="<?php echo e($filter->name); ?>"><?php echo e($filter->name); ?></label>
                                                        </div>
                                                    </form>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                        </div>

                    <div class="col-sm-8 col-md-9">

                                    <div id="filter">

                                    </div>
                                    <div class="restaurant-list-item-wrapper no-last-bb"
                                         id="filterTypeCuisineSearch">
                                        
                                    </div>
                                    

                                     <div class="pagination-wrapper">
                                            <div class="GridLex-grid-middle GridLex-grid-noGutter">
                                                <div class="GridLex-col-6_sm-12_xs-12">
                                                    <div class="text-right text-center-sm mb-10-sm">
                                                    </div>
                                                </div>
                                                <div class="GridLex-col-6_sm-12_xs-12">
                                                    <nav>
                                                        <ul class="pagination pagination-text-center-sm mb-5-xs">
                                                            <?php if(isset($result) && count($result) > 0): ?>
                                                                <?php echo e($result->appends(Request::except('page'))->links()); ?>

                                                            <?php else: ?>
                                                                <?php if($res->total() > 0): ?>
                                                                 <?php echo e($res->appends(Request::except('page'))->links()); ?>

                                                                <?php else: ?>
                                                                <div class="text-danger text-center text-capitalize">sorry no data to show <br>
                                    
                                                                </div>
                                                                 <?php endif; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </nav>

                                                </div>

                                            </div>

                                        </div>
                                    <?php if(request('search') || $res->total() < 5): ?>
                                        <div class="text-danger text-center text-capitalize">
                                            <a href="<?php echo e(route('restaurant')); ?>"
                                               class="text-capitalize btn btn-primary btn-sm text-center">click to show all
                                                restaurant</a>
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
                <script type="text/javascript" src="<?php echo e(asset('FrontEnd')); ?>/js/map/list_script.js"></script>
            <script>
                

                var queryParams = new URLSearchParams(window.location.search);

                $('.filterType').on('click', function (e) {

                    let filterVal = $(this).val();
                   
                    queryParams.set("sort", filterVal);
                    queryParams.set("page", 1);
                    history.replaceState(null, null, "?"+queryParams.toString());

                    location.reload();

                });

                    if(queryParams.get('sort') != null){
                        $('#'+queryParams.get('sort')).prop('checked', true);
                    }

                
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onpeqomeg1ob/public_html/mazen.fnbtime.com/resources/views/client/restaurant.blade.php ENDPATH**/ ?>