@extends('layouts.app')
@section('title' , 'Login')
@section('content')
    <!-- start Container Wrapper -->
    <div class="container-wrapper">
        <div class="main-wrapper scrollspy-container">
            <div class="container pt-10 pb-50">

                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Login-Sign up</li>
                    </ol>
                </div>
            </div>
            <div class="container mt-90 login-page-form">
                <h1 class="text-center">
                    <span data-class="login" class="selected-form">Login</span> | <span
                        data-class="signup">Sign up</span>
                </h1>
                <form action="{{route('login')}}" class="col-lg-offset-4 col-md-offset-4 login" name="login"
                      method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" class="form-control" id="email" placeholder="Your Name required"
                                       name="email" value="{{old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password-login">Password : </label>
                                <input type="password" class="form-control" id="password-login"
                                       placeholder="Your Name required"
                                       name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button name="login" class="btn btn-primary mb-10">Login</button>
                    <a href="{{route('password.request')}}">Forget You're Password Click Here</a>
                </form>

                <form action="{{route('register')}}" class="col-lg-offset-4 col-md-offset-4 signup" name="signup"
                      method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" class="form-control" id="name" placeholder="Enter you're Name"
                                       name="name"
                                       value="{{old('name')}}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email-login">email : </label>
                                <input type="email" class="form-control" id="email-login"
                                       placeholder="Enter you're email"
                                       name="email" value="{{old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">password : </label>
                                <input type="password" class="form-control" id="password"
                                       placeholder="Enter you're password"
                                       name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirm : </label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       placeholder="Enter you're password" name="password_confirmation" required>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="country">country</label>
                            <select id="country" name="country" class="form-control">
                                <option value="0" selected>...</option>
                                @php $country = \App\Model\Country::orderBy('name')->get();@endphp
                                @foreach($country as $countries)
                                    <option class="text-capitalize"
                                            value="{{$countries->id}}">{{$countries->name}}</option>
                                @endforeach
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="city">city</label>
                            <select class="form-control" id="city" name="city">

                            </select>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">phone : </label>
                                <input type="number" class="form-control" id="phone" placeholder="Enter you're phone"
                                       name="phone" value="{{old('phone')}}" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="checkbox-block font-icon-checkbox mb-10">
                        <input class="checkbox" name="subscription" id="filter_cuisine" type="checkbox">
                        <label for="filter_cuisine">Subscription to Our Newsletter ?</label>
                    </div>
                    <button class="btn btn-primary mb-10">Sign-up</button>
                </form>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                $('#country').change(function () {
                    var countryID = $(this).val();
                    if (countryID > 0) {
                        $.ajax({
                            type: "POST",
                            url: "{{url('get-city-list')}}",
                            data: {country: countryID, _token: '{{csrf_token()}}'},
                            success: function (res) {
                                if (res) {
                                    $("#city").empty();
                                    $.each(res, function (key, value) {
                                        $("#city").append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    $("#city").empty();
                                }
                            }
                        });
                    }
                });
            </script>
@endsection

