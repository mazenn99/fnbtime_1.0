@extends('layouts.app')
@section('title' , config('app.name'))
@section('content')

    <!-- start Container Wrapper -->
    <div class="container-wrapper">
        @auth
            @if(empty(Auth()->user()->email_verified_at))
                <div class="alert alert-dismissible text-center alert-success margin-0">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                    {!!  "Please Verify Email Address " . "<strong>".Auth()->user()->email."</strong>" !!}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request
                            another link
                        </button>
                        .
                    </form>
                    @if (session('resent'))
                        <div class="text-dark" role="alert">
                            A fresh verification link has been sent to your email address
                        </div>
                    @endif
                </div>
        @endif
    @endauth
    {{-- message successfully logout --}}
    @include('client._partial.success')
    {{-- message successfully logout --}}

<!-- map container which is hidden but needed for geocoding and places api usage -->
    <div class="map-holder" style="display: none;">
        <div id="hotel-detail-map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 480px;"></div>
    </div>
    
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <div id="kb" class="carousel kb_elastic kb_wrapper hero-kb_elastic hero-kb_elastic-alt-height"
             data-ride="carousel" data-interval="4000" data-pause="false">

            <div class="carousel-inner" role="listbox">

               <div class="item active img-bg"
                         style="background-image:url('{{asset('FrontEnd')}}/images/hero-header-slider/hero-image.png');">
                    </div>

                    <div class="item img-bg"
                         style="background-image:url('{{asset('FrontEnd')}}/images/hero-header-slider/hero-image.png');">
                    </div>

                    <div class="item img-bg"
                         style="background-image:url('{{asset('FrontEnd')}}/images/hero-header-slider/hero-image.png');">
                    </div>


                <div class="kb_overlay"></div>

            </div>

            <div class="hero-kb_elastic-inner text-center"> <!-- add class text-center to center the content -->

                <div class="container">

                    <h1>All You're Fine Dine booking</h1>
                    <p>More than 20,000 restaurants all around the world and in your country or city</p>

                    <div class="home-search-form mt-20-xs">

                        <div class="clear"></div>

                        <div class="home-search-form" style="display: inline-block;text-align: center">

                            <form action="{{route('searchFrom')}}" method="GET" style="margin-bottom: 5px;">

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

        </div>

        <section class="bg-white">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                        <div class="section-title-02 text-center">

                            <h3><span>FNBTime Booking Restaurant</span></h3>

                            <p>We Only Lead You To The Best Places On Earth
                            </p>

                        </div>

                    </div>

                </div>

                <div class="restaurant-grid-wrapper mb-30">
                    <div class="GridLex-gap-30 GridLex-gap-20-mdd">
                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{route('restaurant')}}" class="btn btn-primary">More Restaurants</a>
                </div>

            </div>

        </section>

        <section>

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                        <div class="section-title-02 text-center">

                            <h3><span>How It Works</span></h3>

                            <p>it's Just three Ways And you can reserve you're best restaurant.</p>

                        </div>

                    </div>

                </div>

                <div class="process-wrapper">

                    <div class="GridLex-gap-30 GridLex-gap-20-xs">

                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">

                            <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                                <div class="process-item">

                                    <div class="process-inner">

                                        <div class="number">
                                            01
                                        </div>

                                        <div class="content">

                                            <div class="icon"><i class="flaticon-restaurant-elements-placeholder"></i>
                                            </div>
                                            <h6>Search by Name</h6>
                                            <p>You can search restaurant for name and Tags Or keyword.</p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                                <div class="process-item">

                                    <div class="process-inner">

                                        <div class="number">
                                            02
                                        </div>

                                        <div class="content">

                                            <div class="icon"><i class="flaticon-restaurant-elements-restaurant"></i>
                                            </div>
                                            <h6>Select a restaurant</h6>
                                            <p>You can select You're best restaurant and you can see everything </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="GridLex-col-3_sm-6_xs-6_xss-12">

                                <div class="process-item">

                                    <div class="process-inner">

                                        <div class="number">
                                            03
                                        </div>

                                        <div class="content">

                                            <div class="icon"><i class="flaticon-restaurant-elements-dish"></i></div>
                                            <h6>Reserve a table</h6>
                                            <p>You can Reserve a table for restaurant and we confirm it </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
            <div id="x"></div>
    <!-- end Main Wrapper -->

    <!-- start Footer Wrapper -->
    <div class="footer-wrapper scrollspy-footer">

            @endsection
            @section('script')

                <script type="text/javascript" src="{{asset('FrontEnd')}}/js/map/index_script.js"></script>
                <script>
                   $("#search").keyup(function () {
                        let search = $(this).val();
                        if(search != '') {
                            $.ajax({
                                 url: '{{route("suggestion")}}',
                                method: 'GET',
                                data:{search : search},
                                success:function (response) {
                                    $("#show-list-search").slideDown();
                                  
                                    var res='';
                                    for (i in response) {

                                      res+='<div class="reservation-summary-wrapper"> <a href="restaurant/'+response[i]['id']+'" target="_blank">       <ul class="reservation-summary-list">           <li>            <div class="image">             <img src="images/res-images/menu/'+response[i]['picture']+'" alt="Restaurant image"/>           </div>          </li>                       <li>            <span class="block text-muted text-uppercase">Restaurant</span>             <h6>'+response[i]['name']+'</h6>            </li>                       <li>            <span class="block text-muted text-uppercase">Country</span>            <h6>'+response[i]['country']['couName'] +'</h6>             </li>                       <li>            <span class="block text-muted text-uppercase">city</span>           <h6>'+response[i]['city']['citName']+'</h6>             </li>       </ul> </a> </div>'; 
                  
                                    }

                                    if(res.length==0)
                                        res='<a href="#" class=" text-left list-group-item">No Data</a>';

                                    $("#show-list-search").html(res);




                                }
                            });
                        }
                        else {
                            $('#show-list-search').html('');
                        }
                    })
                    $(document).on('click' , 'a' , function () {
                        $("#search").val($(this).text());
                        $("#show-list-search").html('');
                    })
                </script>
            @endsection
