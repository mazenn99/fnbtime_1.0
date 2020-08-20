@extends('layouts.app')
@section('title' , 'Restaurant')
@section('content')
    <!-- start Container Wrapper -->
    <div class="map-holder" style="display: none;">
                <div id="hotel-detail-map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 480px;"></div>
    </div>

    <div class="container-wrapper">


        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-sm"
                 style="background-image:url('{{asset('asset/FrontEnd')}}/images/hero-header/hero-image.png');">
                <div class="container">

                    <div class="home-search-form mt-20-xs">

                        <div class="clear"></div>

                        <div class="home-search-form" style="display: inline-block;text-align: center">

                            <form action="{{route('searchFrom')}}" method="GET">
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
                        <li><a href="{{route('home')}}">Home</a></li>
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
                                                    


                                                @foreach(\App\Model\TypeFood::orderBy('name' , 'ASC')->get() as $key => $filter)
                                                     <form action="?sort" method="GET">
                                                        <div class="checkbox-block font-icon-checkbox">
                                                            <input class="filterType checkbox" id="{{$filter->name}}" value="{{$filter->name}}"  type="checkbox">
                                                            <label for="{{$filter->name}}">{{$filter->name}}</label>
                                                        </div>
                                                    </form>
                                                @endforeach

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
                                                            @if(isset($result) && count($result) > 0)
                                                                {{$result->appends(Request::except('page'))->links()}}
                                                            @else
                                                                @if($res->total() > 0)
                                                                 {{$res->appends(Request::except('page'))->links()}}
                                                                @else
                                                                <div class="text-danger text-center text-capitalize">sorry no data to show <br>
                                    
                                                                </div>
                                                                 @endif
                                                            @endif
                                                        </ul>
                                                    </nav>

                                                </div>

                                            </div>

                                        </div>
                                    @if(request('search') || $res->total() < 5)
                                        <div class="text-danger text-center text-capitalize">
                                            <a href="{{route('restaurant')}}"
                                               class="text-capitalize btn btn-primary btn-sm text-center">click to show all
                                                restaurant</a>
                                        </div>                                       
                                    @endif
                    </div>

                </div>

            </div>

        </div>
        <!-- end Main Wrapper -->
    @endsection
    @section('script')
        <!-- start Footer Wrapper -->
                <script type="text/javascript" src="{{asset('asset/FrontEnd')}}/js/map/list_script.js"></script>
            <script>
                {{--This to filter cuisine type  --}}

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

                {{--This to filter cuisine type  --}}
            </script>
@endsection
