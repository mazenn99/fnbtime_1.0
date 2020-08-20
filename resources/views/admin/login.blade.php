@include('admin.layout.template.header')
@section('title' , 'Admin Panel')
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('asset/adminFrontEnd')}}/images/icon/fnbtime-logo.svg" alt="CoolAdmin" width="100">
                            </a>
                        </div>
                        <div class="login-form">

                            @include('admin.layout._partial._errorLogin')
                            @include('admin.layout._partial._successLogout')
                            <form action="{{route('admin-login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Please Type Email" required>
                                    @error('email')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Pleas Type Password" required>
                                    @error('password')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">login in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin.layout.template.footer')
