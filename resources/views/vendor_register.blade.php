@extends('layouts.vendor_main')
@php
    $title = 'Vendor Registration';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="alert alert-light m-5">
                <form action="{{ url('/vendor-register') }}" method="POST">
                    @csrf
                    <h1 class="text-center">Register Here!</h1>
                    <p class="text-center">Please fill the details below to get registered and deliver on stations.</p>
                    <div class="mb-3">
                        <label for="owner_name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name"
                            placeholder="Enter Your Name">
                        <span class="text-danger">
                            @error('owner_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant_name" class="form-label">Restaurant Name:</label>
                        <input type="text" class="form-control" id="resaurant_name" name="restaurant_name"
                            placeholder="Enter Your Restaurant Name">
                        <span class="text-danger">
                            @error('restaurant_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number:</label>
                        <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                            placeholder="Enter Your Mobile Number">
                        <span class="text-danger">
                            @error('mobile_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Your Email Address">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Your Password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="conf_vendor_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="conf_vendor_password" name="conf_vendor_password"
                            placeholder="Enter Your Password Again">
                        <span class="text-danger">
                            @error('conf_vendor_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State:</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter Your State">
                        <span class="text-danger">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter Your City">
                        <span class="text-danger">
                            @error('city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="gst_number" class="form-label">GST Number:</label>
                        <input type="number" class="form-control" id="gst_number" name="gst_number"
                            placeholder="Enter Your GST Number">
                        <span class="text-danger">
                            @error('gst_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <a href="vendor-login" class="d-flex justify-content-end text-decoration-none"><small>Already
                                Registered?Login Here.</small></a>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
