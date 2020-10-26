@extends('admin.layout.app')
@section('title' , 'Edit Restaurant ' . $restaurant->name)
@section('content')
    <div class="container-fluid">
        <div class="card m-t-35 m-b-35">
            <div class="card-header">
                Update Restaurant  {{$restaurant->name}}
            </div>
            @include('admin.layout._partial._successLogout')
            <div class="card-body card-block">
                <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Restaurant Contract Link 
                                @if(\App\Model\ContractRestaurant::select('approve_at')->where('res_id' , $restaurant->id)->first()->approve_at != NULL)
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                @endif
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name"
                                   class="form-control" disabled 
                                   value="{{route('contact-page' , \App\Model\ContractRestaurant::select('hash')->where('res_id' , $restaurant->id)->first()->hash)}}" >
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                <form action="{{route('restaurant.update' , $restaurant->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Restaurant Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Please Enter Name"
                                   class="form-control" value="{{$restaurant->name}}" required>
                            @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="type_food" class=" form-control-label">Type Food</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="type_food" value="{{$restaurant->type_food}}" name="type_food"
                                   placeholder="Please Enter Type Food split each one for comma"
                                   class="form-control" required>
                            <small class="form-text text-muted">italian , arabian , indian</small>
                            @error('type_food')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="manager_number" class=" form-control-label">Manager Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="manager_number" value="{{$restaurant->manager_number}}" name="manager_number"
                                   placeholder="Please Enter the manager number"
                                   class="form-control" >
                            @error('manager_number')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="manager_email" class=" form-control-label">Manager Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="manager_email" value="{{$restaurant->manager_email}}" name="manager_email"
                                   placeholder="Please enter the manager email"
                                   class="form-control" >
                            @error('manager_email')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Phone Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{$restaurant->number}}" name="phone"
                                   placeholder="Please Enter Phone number Restaurant"
                                   class="form-control" required>
                            @error('phone')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="9" placeholder="Please Enter Description of Restaurant" class="form-control" required>{{$restaurant->description}}</textarea>
                            @error('description')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="menu" class=" form-control-label">Menu Picture</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="menu" name="menu" class="form-control-file">
                            <small class="form-text text-muted"><strong>Notice : </strong> if you upload new picture of menu then will delete old one and replace it for new one</small>
                            @error('menu')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="country" class=" form-control-label">Country</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="country" id="country" class="form-control" required>
                                <option value="{{$restaurant->country->id}}">{{$restaurant->country->name}}</option>
                                @foreach(\App\Model\Country::orderBy('name' , 'ASC')->get() as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control" required>
                                <option value="{{$restaurant->city->id}}">{{$restaurant->city->name}}</option>
                            </select>
                            @error('city')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Logmaty</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="@if($restaurant->appsDelivery()->exists()) {{$restaurant->appsDelivery->logmaty}} @endif" name="logmaty"
                                   placeholder="Please Enter the url of resturant in logmaty app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Marsool</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="@if($restaurant->appsDelivery()->exists()) {{$restaurant->appsDelivery->mrsool}} @endif" name="mrsool"
                                   placeholder="Please Enter the url of resturant in mrsool app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Hunger station</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="@if($restaurant->appsDelivery()->exists()) {{$restaurant->appsDelivery->hungerStation}} @endif" name="hungerStation"
                                   placeholder="Please Enter the url of resturant in hunger station app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Jahiz</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="@if($restaurant->appsDelivery()->exists()) {{$restaurant->appsDelivery->jahiz}} @endif" name="jahiz"
                                   placeholder="Please Enter the url of resturant in jahiz app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="careemNow" class=" form-control-label">Careem Now</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="careemNow" value="@if($restaurant->appsDelivery()->exists()) {{$restaurant->appsDelivery->careemNow}} @endif" name="careemNow"
                                   placeholder="Please Enter the url of resturant in careem Now app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Location in google maps</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="url" id="phone" value="{{$restaurant->map_url}}" name="location"
                                   placeholder="Please Enter url in google maps location Restaurant"
                                   class="form-control" required>
                            @error('location')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Save
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
