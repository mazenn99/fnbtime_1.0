@extends('layouts.app')
@section('title' , 'success reservation')
@section('content')

    <!-- start Container Wrapper -->
    <div class="container-wrapper">

        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

        @if(session('reserve-success'))

            <!-- start hero-header -->
                <div class="hero hero-breadcrumb"
                     style="background-image:url('{{asset('asset/FrontEnd')}}/images/hero-header/hero-image.png');">

                    <div class="container">

                        <p>You have successfully booked your table at</p>
                        <h1>{{$ResName}} Restaurant </h1>

                    </div>

                </div>

                <div class="container pt-10 pb-30">

                    <div class="breadcrumb-wrapper">

                        <ol class="breadcrumb">

                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="active">Reserve successful</li>

                        </ol>

                    </div>

                    <div class="row mt-40 mb-30">

                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                            <div class="alert alert-success alert-icon">

                                <i class="fa fa-check-circle"></i>

                                <h4>Your reservation has been Received On Number
                                    <strong>{{$bookingNumber}}</strong> We Confirmed To you less than 24
                                    hours</h4>

                            </div>

                            <div class="clear mb-10"></div>

                            <h3>Hello {{Auth()->user()->name}}</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti et porro
                                sapiente vero. Aliquam at aut delectus deleniti dolores dolorum esse, ex excepturi
                                exercitationem fuga, inventore ipsa iure labore laborum molestiae natus neque nisi nulla
                                numquam odio possimus quasi quibusdam quos rem suscipit totam voluptatibus? Architecto
                                aut blanditiis deleniti ducimus excepturi nesciunt non numquam provident reprehenderit
                                voluptates. Excepturi, repudiandae!</p>

                            <div class="clear mt-30 mb-30" style="border-bottom: 3px double #D9D8D7;"></div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-6 mb-30-xs">

                                    <h5 class="text-primary">Your reservation details</h5>

                                    <ul class="list-with-icon mt-25 mb-0">
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            {{$date}}
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            {{$time}}
                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i>
                                            {{$persons}}
                                        </li>
                                    </ul>

                                </div>

                                <div class="col-xs-12 col-sm-6">

                                    <h5 class="text-primary">Restaurants details</h5>

                                    <ul class="list-with-icon mt-25 mb-0">
                                        <li>
                                            <i class="fa fa-cutlery"></i>
                                            <h6>
                                                <a href="{{route('res-info' , $resId)}}">{{$ResName}}</a>
                                            </h6>
                                        </li>
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            {{$country . ' ' . $city}}
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            {{$ResNumber}}
                                        </li>
                                    </ul>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

        </div>

        <!-- start Footer Wrapper -->
        <div class="footer-wrapper scrollspy-footer">
    @else
                <div class="text-center">
                    <h3 class="text-danger">Can't Access This Page Directly Check All Reservation here</h3>
                </div>
    @endif
@endsection
