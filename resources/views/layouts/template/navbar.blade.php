<header id="header">
    <!-- start Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top ">

        <div class="header-inner">

            <div class="navbar-header">
                <a class="navbar-brand hidden-xs" href="{{route('home')}}"><img id="logo-img"
                                                                                src="{{asset('asset/FrontEnd')}}/images/logo_only.svg"
                                                                                alt="Image"/></a>
                <a class="navbar-brand visible-xs" href="{{route('home')}}"><img id="logo-img"
                                                                                 src="{{asset('asset/FrontEnd')}}/images/logo_only.svg"
                                                                                 alt="Image"/></a>
            </div>

            <div id="navbar" class="collapse navbar-collapse navbar-arrow pull-left">

                <ul class="nav navbar-nav" id="responsive-menu">
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('restaurant')}}">Restaurant</a>
                    </li>
                    <li><a href="{{route('contact-us')}}">Contact</a></li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                </ul>
            </div><!--/.nav-collapse -->

            <div class="pull-right">
                <div class="navbar-mini">
                    <ul class="clearfix">
                        <li class="user-action">
                        @if(Auth()->check())
                            <li class="dropdown bt-dropdown-click">
                                <a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    @if(!empty(Auth()->user()->email_verified_at))
                                        <i class="fa fa-check" data-toggle="tooltip" data-placement="bottom"
                                           title="You're Account Is verify"
                                           style="margin-right: 2px;background-color: #27ae60;padding: 3px 5px;color: #FFF;border-radius: 50%;;"></i>
                                    @else
                                        <i class="fa fa-close" data-toggle="tooltip" data-placement="bottom"
                                           title="You're Account Isn't verify"
                                           style="margin-right: 2px;background-color: #c0392b;padding: 3px 5px;color: #FFF;border-radius: 50%;;"></i>
                                    @endif
                                    <i class="fa fa-user mr-5"></i>
                                    {{Auth()->user()->name}}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                                    <li><a href="{{route('client-info')}}">My Profile</a></li>
                                    <li><a href="{{route('edit-profile')}}">Edit Profile</a></li>
                                <li>

                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>


                                    </li>
                                </ul>
                            </li>
                        @else
                            <li>
                            <a href="{{route('login')}}" class="btn btn-primary btn-inverse btn-sm">Sign up/in</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
    <!-- end Navbar -->

</header>
<!-- end Header -->

