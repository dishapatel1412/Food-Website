@extends('layouts.vendor_main')
@php
    $title = 'Vendor Dashboard';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <section id="vendor_dash">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="col">
                            <ul class="list-unstyled m-5">
                                <li class="p-3"><a href="#myprofile" class="text-body text-decoration-none">My Profile</a>
                                </li>
                                <li class="p-3"><a href="#additems" class="text-body text-decoration-none"
                                    data-bs-toggle="modal" data-bs-target="#additems">Add Items</a></li>
                                <li class="p-3"><a href="#vieworders" class="text-body text-decoration-none">View
                                    Orders</a></li>
                                <li class="p-3"><a href="#pastorders" class="text-body text-decoration-none">Past
                                    Orders</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-9">
                        <section id="my-profile">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            {{-- modal to add new items --}}
            <div class="modal" tabindex="-1" id="additems">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Item Here</h5>
                        </div>
                        <form action="{{ url('/food-items') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="imageUpload" class="form-label">Upload Image:</label>
                                    <input type="file" class="form-control" id="imageUpload" name="imageUpload">
                                    <span class="text-danger">
                                        @error('imageUpload')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-1">
                                    <label for="food-name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="food-name" name="food-name"
                                        placeholder="Enter Name">
                                    <span class="text-danger">
                                        @error('food-name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-1">
                                    <label for="food-price" class="form-label">Price:</label>
                                    <input type="text" class="form-control" id="food-price" name="food-price"
                                        placeholder="Enter Price">
                                    <span class="text-danger">
                                        @error('food-price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
