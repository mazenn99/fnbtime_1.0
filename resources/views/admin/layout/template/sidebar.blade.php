<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
    <div class="logo">
        <a href="{{route('home')}}" target="_blank">
            <h2 class="text-white pl-2">Home site</h2>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="{{asset('asset/adminFrontEnd')}}/images/avatar/@if(!(is_null(Auth::guard('admin')->user()->photo))){{Auth::guard('admin')->user()->photo}}@else{{'empty-avatar.png'}} @endif" width="400px" height="400px"/>
            </div>
            <h4 class="name">{{Auth::user()->name}}</h4>
            <form action="{{route('logout-admin')}}" method="POST">
                @csrf
                <button class="btn btn-outline-link btn-sm">Sign out</button>
            </form>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="https://sg2plcpnl0079.prod.sin2.secureserver.net:2096" target="_blank">
                        <i class="fas fa-chart-bar"></i>Mail Box</a>
                </li>
                <li>
                    <a href="{{route('restaurant.index')}}">
                        <i class="zmdi zmdi-cocktail"></i>
                        Restaurant</a>
                </li>
                @if(Auth::user()->is_admin == 1)
                <li>
                    <a href="{{route('users.index')}}">
                        <i class="fa fa-users"></i>Users</a>
                </li>
                @endif
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-key"></i>Booking
                        <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                    </a>
                    <ul class="list-unstyled open navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('booking.index')}}">
                                <i class="fas fa-table"></i>Last Booking</a>
                        </li>
                        <li>
                            <a href="{{route('allBooking')}}">
                                <i class="far fa-check-square"></i>All Booking</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
