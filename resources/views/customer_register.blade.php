@extends('layouts.main')
@php
    $title = 'Customer Registration';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="alert alert-light m-5">
                <form action="{{ url('/customer-register') }}" method="POST">
                    @csrf
                    <h1 class="text-center">Register Here!</h1>
                    <p class="text-center">Please fill the details below to get registered and order delicious food.</p>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Your Email Address">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Your Name">
                        <span class="text-danger">
                            @error('name')
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
                        <a href="customer-login" class="d-flex justify-content-end text-decoration-none"><small>Already
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
