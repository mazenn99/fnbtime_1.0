<header class="header-desktop2">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap2">
                <div class="logo d-block d-lg-none">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="CoolAdmin"/>
                    </a>
                </div>
                <div class="header-button2">
                    <div class="header-button-item js-item-menu">
{{--                        <i class="zmdi zmdi-search"></i>--}}
                        <div class="search-dropdown js-dropdown">
                            <form action="">
                                <input class="au-input au-input--full au-input--h65" type="text"
                                       placeholder="Search for datas &amp; reports..."/>
                                <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                            </form>
                        </div>
                    </div>
                    <div class="header-button-item has-noti js-item-menu">
                        <i class="zmdi zmdi-notifications"></i>
                        <div class="notifi-dropdown js-dropdown">
                            <div class="notifi__title">
                                <p>You have <strong>{{\App\Model\Booking::where('status' , 0)->count()}}</strong> Booking waiting approve</p>
                            </div>
                            @foreach(\App\Model\Booking::where('status' , 0)->orderBy('id' , 'DESC')->limit(5)->get() as $lastBooking)
                                <a href="{{route("booking.index")}}">
                                    <div class="notifi__item"> 
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-book"></i>
                                    </div>
                                    <div class="content">
                                        <p class="text-capitalize">{{$lastBooking->name}} in {{$lastBooking->restaurant->name}} Restaurant</p>
                                        <span class="date">{{\Carbon\Carbon::parse($lastBooking->occasion_date)->toDateString()}}</span>
                                    </div>
                                </div>
                                </a>
                            @endforeach
                            <div class="notifi__footer">
                                <a href="{{route('booking.index')}}">All reservation</a>
                            </div>

                        </div>
                    </div>
                    <div class="header-button-item mr-0 js-sidebar-btn">
                        <i class="zmdi zmdi-menu"></i>
                    </div>
                    <div class="setting-menu js-right-sidebar d-none d-lg-block">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="{{route('edit-admin-info')}}">
                                    <i class="zmdi zmdi-account"></i>Edit Account</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#" onclick="event.preventDefault();
                                            document.getElementById('logoutForm').submit();">
                                    <i class="zmdi zmdi-account"></i>Logout</a>
                            </div>
                            <div class="account-dropdown__item">
                                <form action="{{route('logout-admin')}}" id="logoutForm" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
