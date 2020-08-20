@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/taras-d/images-grid/src/images-grid.min.css">
@endsection
@section('title' , $res->name)
@section('content')



    <!-- start Container Wrapper -->
    <div class="container-wrapper">

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-detail"
                 style="background-image:url('{{asset('FrontEnd')}}/images/hero-header/hero-image.png');">

                <div class="container">

                    <div class="hero-detail-inner">

                        <div id="detail-content-sticky-nav-00" class="hero-detail-bottom">

                            <div class="GridLex-grid-bottom">

                                <div class="GridLex-col-8_sm-7_xs-12_xss-12">
                                    <div class="detail-header">
                                        <div class="detail-header-inner">
                                            <h3 style="display: inline-block">{{$res->name}}</h3>
                                            <p class="location"><i
                                                    class="fa fa-map-marker"></i> {{$res->country->couName}}
                                                <span> </span> {{$res->city->citName}}</p>
                                            <div class="rating-wrapper">
                                                {{--<?php here all resrvation of this restaurnat
                                                $num = getAllReservation($result['id']);
                                                if (!empty($num)) { ?>
                                                <span class="texting">  All Reservation : <?php
                                                    echo $num ?></span>
                                                <?php } ?>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @auth
                                    <div class="GridLex-col-4_sm-4_xs-12_xss-12">
                                        <div class="text-right text-left-xs">
                                            <div class="btn-holder mt-5">
                                                <button class="btn btn-light anchor-alt" data-value="{{$res->id}}"
                                                        id="favorite">
                                                        @if(\App\Model\Favorite::where('user_id' , \Illuminate\Support\Facades\Auth::id())
                                                                                ->where('res_id' , $res->id)->count())
                                                        {{'Saved'}}
                                                        @else
                                                            {{'Added To Favorite'}}
                                                        @endif
                                                    <i class="fa fa-heart ml-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-10 pb-50">

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Restaurant detail</li>

                    </ol>

                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-8 col-md-9 mb-30">

                        <div class="multiple-sticky for-detail-page">

                            <div class="multiple-sticky-inner">

                                <div class="multiple-sticky-container container">

                                    <div class="multiple-sticky-item clearfix">

                                        <ul id="top-menu" class="multiple-sticky-nav clearfix">
                                            <li>
                                                <a href="#detail-content-sticky-nav-00">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#detail-content-sticky-nav-02">Review</a>
                                            </li>
                                         

                                            <li>
                                                <a href="#detail-content-sticky-nav-01">Menu</a>
                                            </li>

                                            <li>
                                                <a href="#detail-content-sticky-nav-03">Photo</a>
                                            </li>
                                           
                                            <li>
                                                <a href="#detail-content-sticky-nav-04">Location</a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="clear mb-40"></div>

                        <div class="detail-content-for-sticky-menu for-detail-page">

                            <div class="detail-content-section clearfix">

                                <div class="section-title-02">
                                    <h3><span>Overview</span></h3>
                                </div>

                                <p class="font500" id="rdescription"></p>


                                <div class="driver-icon section-title">
                                    <div class="section-title-02">
                                        <h3><span>support in</span></h3>
                                    </div>

                                    @if(!empty($res->appsDelivery->mrsool))
                                        <a href="{{$res->appsDelivery->mrsool}}"
                                           target="_blank"><img src="{{asset('FrontEnd')}}/images/mrsool.png"></a> <br>
                                    @endif

                                    @if(!empty($res->appsDelivery->logmaty))
                                        <a href="{{$res->appsDelivery->logmaty}}"
                                           target="_blank"><img src="{{asset('FrontEnd')}}/images/logmaty.png"></a> <br>
                                    @endif

                                    @if(!empty($res->appsDelivery->hungerStation))
                                        <a href="{{$res->appsDelivery->hungerStation}}"
                                           target="_blank"><img
                                                src="{{asset('FrontEnd')}}/images/hungerstation.png"></a> <br>
                                    @endif

                                    @if(!empty($res->appsDelivery->jahiz))
                                        <a href="{{$res->appsDelivery->jahiz}}"
                                           target="_blank"><img src="{{asset('FrontEnd')}}/images/jahiz.png"></a> <br>
                                    @endif

                                    @if(!empty($res->appsDelivery->careemNow))
                                        <a href="{{$res->appsDelivery->careemNow}}"
                                           target="_blank"><img src="{{asset('FrontEnd')}}/images/careemNow.png"></a>
                                        <br>
                                    @endif

                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-6 mb-20">

                                        <div class="contact-box">

                                            <h5 class="text-primary">Contact Information</h5>


                                            <ul class="contact-list"></ul>

                                            <a href="#" target="_blank" class="btn btn-primary btn-sm anchor-alt">See map &amp; get route</a>
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-6">

                                        <div class="open-time-box">

                                            <h5 class="text-primary">Opening Time</h5>

                                            <ul class="open-time-list"></ul>

                                        </div>

                                    </div>

                                </div>

                            </div>


                             <div id="detail-content-sticky-nav-02" class="detail-content-section clearfix">
                                <div class="section-title-02">
                                    <h3><span>Review</span></h3>
                                </div>
                                <div class="review-wrapper">
                                    <div class="review-header">
                                        <div class="GridLex-gap-30">
                                            <div class="GridLex-grid-middle">
                                                <div class="GridLex-col-4_sm-5_xs-12">
                                                    <div class="average-score"></div> <!-- rating and review values are added here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-item-wrapper">
                                        <ul class="review-item-list"></ul> <!-- user reviews are added here -->
                                    </div>
                                </div>
                                <div class="clear mb-15"></div>
                            </div>
                            
                            <div id="detail-content-sticky-nav-01" class="detail-content-section clearfix">

                                <div class="section-title-02">
                                    <h3><span>Menu</span></h3>
                                </div>

                                <div class="tab-style-01-wrapper mt-30 mb-20">

                                    <div class="tab-content">

                                        <div class="tab-pane fade in active" id="tab-style-01-01s">

                                            <div class="tab-inner">

                                                <div class="food-menu-wrapper">

                                                    <div class="GridLex-gap-30">

                                                        <div class="GridLex-grid-noGutter-equalHeight">
                                                            <div class="btn-holder mt-5">
                                                                <a href="{{asset('images/res-images/menu') . '/' . $res->menu}}"
                                                                   class="btn btn-primary " target="_blank"><i class="fa fa-bars mr-3" aria-hidden="true"></i>Click to see Menu</a>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                </div>

                            </div>

                            <div id="detail-content-sticky-nav-03" class="detail-content-section clearfix">

                                <div class="section-title-02">
                                    <h3><span>Photo</span></h3>
                                </div>

                                <div id="detail-food-photo"></div>

                                <div class="clear mb-15"></div>

                            </div>

                            <div id="detail-content-sticky-nav-04" class="detail-content-section clearfix">
                                <div class="section-title-02">
                                    <h3><span>Location</span></h3>
                                </div>
                                <div class="map-holder">
                                    <!-- map -->
                                    <div id="hotel-detail-map" data-lat="25.19739" data-lon="55.28821" style="width: 100%; height: 480px;"></div>
                                </div>
                            </div>

                        </div>

                        <div class="multiple-sticky">
                            <div class="hidden">is used to stop multi-sticky</div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3">

                        <div class="deal-sm clearfix mt-10">


                        </div>

                        <div class="reserve-box mt-30">

                            <h5 class="text-center">Reserve your table</h5> <!-- add class text-center -->
                            <div class="form-wrapper">
                                <form method="POST" action="{{route('reserve' , $res->id)}}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12">

                                            <div class="input-group mb-15">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" name="FullName" placeholder="Full Name"
                                                       class="form-control" value="{{old('FullName')}}" required/>
                                                @error('FullName')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-15">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="email" name="email" placeholder="Email Address"
                                                       class="form-control" value="{{old('email')}}" required/>
                                                @error('email')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-15">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-earphone"></i></span>
                                                <input type="text" name="phone" placeholder="Phone Number"
                                                       class="form-control" value="{{old('phone')}}" required/>
                                                @error('phone')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-15">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="date" name="date" placeholder="dd/mm/yyyy"
                                                       class="form-control" value="{{old('date')}}" required/>
                                                @error('date')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="row gap-15">

                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="input-group mb-15">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-time"></i></span>
                                                        <input type="time" name="time" placeholder="hh-mm"
                                                               class="form-control" value="{{old('time')}}" required/>

                                                        @error('time')
                                                        <small class="form-text text-danger">{{$message}}</small>
                                                        @enderror

                                                    </div>

                                                </div>

                                                <div class="col-xs-6 col-sm-6">

                                                    <div class="input-group mb-15">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-male"></i></span>
                                                        <input type="number" name="persons" placeholder="Persons"
                                                               class="form-control" value="{{old('persons')}}"
                                                               required/>
                                                        @error('persons')
                                                        <small class="form-text text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                            {{-- this to check if user verify on system or not --}}
                                            @auth
                                                @if(@auth::user()->hasVerifiedEmail())
                                                    <div class="text-center">
                                                        <button class="btn btn-primary btn-block">Reserve now</button>
                                                    </div>
                                                @else
                                                    <p class='text-center text-capitalize text-danger'>Please Verify
                                                        You're Email</p>
                                                @endif
                                            @endauth

                                            @guest()
                                                <p class='text-primary text-center'><a href='{{route('login')}}'
                                                                                       target='_blank'>Please
                                                        Register or login</a></p>
                                            @endguest


                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>


                    </div>

                </div>

                <div class="row mt-30 container">

                    <div class="col-md-12">

                        <div class="section-title-02">

                            <h3><span>You may also like</span></h3>

                        </div>

                    </div>

                </div>

                <div class="GridLex-gap-30 container">
                    <div class="GridLex-grid-noGutter-equalHeight"></div> <!-- other restaurants in same city are added here -->
                </div>

            </div>

        </div>
    </div>

    <!-- start Footer Wrapper -->
    <div class="footer-wrapper scrollspy-footer">
        @endsection
        @section('script')

            <script type="text/javascript" src="{{asset('FrontEnd')}}/js/map/restaurant_script.js"></script>

            <script type="text/javascript" src="{{asset('FrontEnd')}}/js/images-grid.js"></script>
            <script defer type="text/javascript" src="{{asset('FrontEnd')}}/js/infobox.js"></script>
            <!-- load the images to the slider -->
            @auth
            <script>
                $('#favorite').on('click' , function(e) {
                    let btnVal = $(this).data('value');
                    if(btnVal != 0) {
                        $.ajax({
                            url : '{{route("favorite")}}',
                            method : 'POST',
                            data : {
                                '_token' : "{{csrf_token()}}",
                                'value' : btnVal,
                            } ,
                            success:function(success) {
                                if(success == 200) {
                                    $('#favorite').text('Saved')
                                } else {
                                    $('#favorite').text('Not saved')
                                }
                            }
                        });
                    }
                });
            </script>
            @endauth
@endsection
