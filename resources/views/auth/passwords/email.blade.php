@extends('layouts.app')
@section('title' , 'Password Reset')
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

            <div class="container mt-90 login-page-form">
                <h1 class="text-center">Please Enter You're Email</h1>
                <form action="{{ route('password.email') }}" class="col-lg-offset-4 col-md-offset-4"
                      method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Your Email required"
                                       name="email" required>
                                @error('email')
                                <span class="invalid-feedback form-text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mb-20">Send Password Link</button>
                </form>
            </div>
        </div>
@endsection
