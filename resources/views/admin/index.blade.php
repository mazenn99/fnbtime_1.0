@extends('admin.layout.app')
@section('title' , 'Dashboard Fnbtime')
@section('content')
    <section class="statistic">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    @if(Auth::user()->is_admin == 1)
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item">
                                <a href="{{route('users.index')}}"><h2 class="number">{{\App\User::count()}}</h2>
                                    <span class="desc">Register User</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item">
                                <a href="#"><h2 class="number">{{\App\Model\ContractRestaurant::count()}}</h2>
                                    <span class="desc">Contracts</span> <br>
                                    Approved : {{\App\Model\ContractRestaurant::where('approve_at' , '!=' , 'NULL')->count()}} 
                                    <br>
                                    Not Approved : {{\App\Model\ContractRestaurant::whereNull('approve_at')->count()}}
                                    <div class="icon">
                                        <i class="zmdi zmdi-bookmark"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <a href="{{route('restaurant.index')}}"><h2 class="number">{{\App\Model\Restaurant::count()}}</h2>
                                <span class="desc">All Restaurant</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-cutlery"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <a href="{{route('booking.index')}}">
                                <h2 class="number">{{\App\Model\Booking::where('status' , 0)->count()}}</h2>
                                <span class="desc">Last Booking</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-key"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <a href="{{route('allBooking')}}">
                                <h2 class="number">{{\App\Model\Booking::count()}}</h2>
                                <span class="desc">All Booking</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-key"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END STATISTIC-->
@endsection

