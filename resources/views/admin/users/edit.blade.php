@extends('admin.layout.app')
@section('title' , 'Edit ' . $user->name)
@section('content')
    <div class="container-fluid">

        <div class="card m-t-35 m-b-35">
            <div class="card-header">
                Edit User <strong class="text-capitalize">{{$user->name}}</strong>
            </div>

            @include('admin.layout._partial._successLogout')

            <div class="card-body card-block">
                <form action="{{route('users.update' , $user->id)}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Static</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static text-capitalize">{{$user->name}}
                                @if(!(is_null($user->email_verified_at)))
                                    <span class="badge badge-success"><i class="fa fa-check"></i></span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Please Enter Name"
                                   class="form-control" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email-input" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="email-input" value="{{$user->email}}" name="email"
                                   placeholder="Please Enter Email"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">phone</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{$user->phone}}" name="phone"
                                   placeholder="Please Enter Phone number"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="password-input" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="hidden" name="oldPass" value="{{$user->password}}">
                            <input type="password" id="password-input" name="password"
                                   placeholder="Leave The password if you don't want to change it"
                                   class="form-control">
                            <small class="help-block form-text">Leave The password if you don't want to change it , it
                                take old one</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="country" class=" form-control-label">Country</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="country" id="country" class="form-control">
                                <option value="{{$user->country->id}}">{{$user->country->name}}</option>
                                @foreach(\App\Model\Country::orderBy('name' , 'ASC')->get() as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control">
                                <option value="{{$user->city->id}}">{{$user->city->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">subscription</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="subscription" class="form-check-label ">
                                    <input type="checkbox" id="subscription" @if($user->subscription == 1) checked
                                           @endif name="subscription" value="subscription"
                                           class="form-check-input">subscription
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                </form>
            </div>

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
