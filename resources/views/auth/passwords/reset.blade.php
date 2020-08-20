@extends('layouts.app')
@section('title' , 'Reset password form')
@section('content')

    <!-- start Container Wrapper -->
    <div class="container-wrapper">
        <div class="main-wrapper scrollspy-container">
            <div class="container pt-10 pb-50">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Forget Password</li>
                    </ol>
                </div>
            </div>


            <div class="container mt-90 login-page-form justify-content-center">
                <h1 class="text-center">Please Enter You're New Password</h1>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">


                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" class="form-control" id="email"
                                       placeholder="Enter New Password"
                                       name="email" value="{{ $email ?? old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback form-text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">Password : </label>
                                <input type="password" class="form-control" id="password"
                                       placeholder="Enter New Password"
                                       name="password" required>
                                @error('password')
                                <span class="invalid-feedback form-text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                       placeholder="Enter You're password Again"
                                       name="password_confirmation" required>
                                @error('password_confirmation')
                                <span class="invalid-feedback form-text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mb-20">Update Password</button>
                </form>
            </div>
        </div>
    </div>


@endsection
