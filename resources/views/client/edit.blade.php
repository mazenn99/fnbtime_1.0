@extends('layouts.app')
@section('title' , "Edit Profile " . \Illuminate\Support\Facades\Auth::user()->name)
@section('content')
    <!-- start Container Wrapper -->
    <div class="container-wrapper">

    <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <!-- start hero-header -->
            <div class="hero hero-breadcrumb" style="background-image:url('{{asset('asset/FrontEnd')}}images/hero-header/hero-image.png');">

                <div class="container">

                    <h1>Edit You're {{\Illuminate\Support\Facades\Auth::user()->name}} Profile</h1>

                </div>

            </div>
            <div class="container pt-10 pb-30">

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Edit Profile</li>

                    </ol>

                </div>
                <form action="{{route('edit-profile')}}" class="col-lg-offset-4 col-md-offset-4" method="POST">
                    @csrf
                    <div class="width-50">
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" id="name"
                                       placeholder="Enter you're Name" name="name" required>
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
                                <label for="email">email : </label>
                                <input type="email" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" id="email-login"
                                       placeholder="Enter you're email" name="email" required>
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
                                <input type="password" class="form-control"  id="password"
                                       placeholder="Leave it if you don't want to change it" name="password">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="country">country</label>
                            <select class="form-control" id="country" name="country" onchange="changeCountry()">
                                <option value="{{\Illuminate\Support\Facades\Auth::user()->country->id}}">{{\Illuminate\Support\Facades\Auth::user()->country->name}}</option>
                                @php $country = \App\Model\Country::where('id' , '!=' , \Illuminate\Support\Facades\Auth::user()->country->id)->orderBy('name')->get();@endphp
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
                                @php $city =\App\Model\City::where('country_id' , \Illuminate\Support\Facades\Auth::user()->country_id)->first();@endphp
                                <option value="{{$city->id}}">{{$city->name}}</option>
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
                                <input type="number" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" id="phone"
                                       placeholder="Enter you're phone" name="phone" required>
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="form-text text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="checkbox-block font-icon-checkbox mb-10">
                        <input class="checkbox" name="subscription" id="filter_cuisine" type="checkbox">
                        <label for="filter_cuisine">Subscription to Our Newsletter ?</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Update!</button>
                            </div>
                        </div>
                    </div>
                </form>
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


