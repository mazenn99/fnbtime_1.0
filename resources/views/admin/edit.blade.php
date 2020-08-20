@extends('admin.layout.app')
@section('title' , 'Edit ' . Auth::user()->name)
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Add New Admin</h3>
                        </div>
                        @include('admin.layout._partial._successLogout')
                        <hr>
                        <form action="{{route('update-admin-info')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id='name' name="name" type="text" placeholder="Type Admin Name"
                                       class="form-control" value="{{Auth::user()->name}}" required>
                                @error('name')
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id='email' name="email" type="email" value="{{Auth::user()->email}}"
                                       placeholder="Type Admin Email" class="form-control cc-name valid" data-val="true"
                                       data-val-required="Please enter the name"
                                       autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                       aria-describedby="cc-name-error">
                                @error('email')
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Password</label>
                                <input id="cc-number" name="password" type="password"
                                       class="form-control cc-number identified visa" value="" data-val="true"
                                       data-val-required="Please enter a valid password"
                                       data-val-cc-number="Please enter a valid password"
                                       autocomplete="cc-number" placeholder="Type new Password">
                                       <small class="text-muted">leave password field if you don't want change your password</small>
                                @error('password')
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true">{{$message}}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Password</label>
                                <input id="cc-number" name="password_confirmation" type="password"
                                       class="form-control cc-number identified visa" value="" data-val="true"
                                       data-val-required="Please enter a valid password"
                                       data-val-cc-number="Please enter a valid password"
                                       autocomplete="cc-number" placeholder="re-write new Password">
                                @error('password_confirmation')
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Photo</label>
                                <input id="cc-number" name="photo" type="file"
                                       class="form-control-file" data-val="true">
                                @error('profile')
                                <span class="help-block field-validation-valid text-danger" data-valmsg-for="cc-name"
                                      data-valmsg-replace="true">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
