@extends('layouts.app')
@section('title' , 'Contact us')
@section('content')
    <!-- start Container Wrapper -->
    <div class="container-wrapper">


        <!-- start Main Wrapper -->
        <div class="main-wrapper scrollspy-container">

            <div class="container pt-10 pb-50">

                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>

                <div class="mt-40">

                    <div class="section-title-02 text-center">

                        <h3><span>Contact Us</span></h3>
                        <p>Was are delightful solicitude discovered collecting man day. Resolving neglected sir
                            tolerably
                            but existence conveying for.</p>

                    </div>

                    <h6 class="text-center">Send us a Message</h6>

                    <form action="{{route('send-message')}}" method="POST" class="col-lg-offset-4 col-md-offset-4">
                        @include('client._partial.success')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" value="{{old('name')}}" class="form-control"
                                           placeholder="Your Name required" name="name"
                                           required>
                                    @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{old('email')}}"
                                           placeholder="Your Email required"
                                           name="email" required>
                                    @error('email')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" id="textarea" placeholder='Please enter the message here'
                                              cols="30" rows="10" class="form-control"
                                              required>{{old('message')}}</textarea>
                                    @error('message')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mb-30">Send Message</button>
                    </form>
@endsection
