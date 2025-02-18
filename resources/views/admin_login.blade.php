@extends('layouts.admin_main')
@php
    $title='Admin Login';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="alert alert-light m-5">
                <h1 class="text-center">Login Here!</h1>
                <div class="mb-3">
                    <label for="customer_email" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="customer_email" placeholder="Enter Your Email Address">
                </div>
                <div class="mb-3">
                    <label for="customer_password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="customer_password" placeholder="Enter Your Password">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Login">
                </div>
            </div>
        </div>
    </main>
@endsection
