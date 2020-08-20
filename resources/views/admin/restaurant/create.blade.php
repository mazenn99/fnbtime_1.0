@extends('admin.layout.app')
@section('title' , 'Add New Restaurant')
@section('content')
    <div class="container-fluid">

        <div class="card m-t-35 m-b-35">
            <div class="card-header">
                Add new Restaurant
            </div>
            @include('admin.layout._partial._successLogout')

            <div class="card-body card-block">
                <form action="{{route('restaurant.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Restaurant Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Please Enter Name"
                                   class="form-control" value="{{old('name')}}" required>
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
                            <input type="text" id="type_food" value="{{old('type_food')}}" name="type_food"
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
                            <label for="phone" class=" form-control-label">Phone Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{old('phone')}}" name="phone"
                                   placeholder="Please Enter Phone number Restaurant"
                                   class="form-control" required>
                            @error('phone')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Desciption</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="9" placeholder="Please Enter Description of Restaurant" class="form-control" required>{{old('description')}}</textarea>
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
                            <input type="file" id="menu" name="menu" class="form-control-file" required>
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
                                <option value="">...</option>
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
                            <input type="text" id="phone" value="{{old('logmaty')}}" name="logmaty"
                                   placeholder="Please Enter the url of resturant in logmaty app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Mrsool</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{old('mrsool')}}" name="mrsool"
                                   placeholder="Please Enter the url of resturant in mrsool app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Hunger station</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{old('hungerStation')}}" name="hungerStation"
                                   placeholder="Please Enter the url of resturant in hunger station app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Jahiz</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{old('jahiz')}}" name="jahiz"
                                   placeholder="Please Enter the url of resturant in jahiz app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Careem Now</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phone" value="{{old('careemNow')}}" name="careemNow"
                                   placeholder="Please Enter the url of resturant in careem Now app"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phone" class=" form-control-label">Location in google maps</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="url" id="phone" value="{{old('location')}}" name="location"
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
