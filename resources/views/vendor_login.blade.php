@extends('layouts.vendor_main')
@php
    $title='Vendor Login'
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="alert alert-light m-5">
                <form action="{{ url('/vendor-login') }}" method="POST">
                    @csrf
                    <h1 class="text-center">Login Here!</h1>
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
                        <a href="vendor-register" class="d-flex justify-content-end text-decoration-none"><small>New
                                Here?Register Now.</small></a>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
