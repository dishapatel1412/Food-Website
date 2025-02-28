@extends('layouts.admin_main')
@php
    $title='Admin Dashboard';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <section id="admin_dash">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="col">
                            <ul class="list-unstyled m-5">
                                <li class="p-3"><a href="#registeredvendors" class="text-body text-decoration-none">Registered Vendors</a></li>
                                <li class="p-3"><a href="#registeredusers" class="text-body text-decoration-none">Registered Users</a></li>
                                <li class="p-3"><a href="#orders" class="text-body text-decoration-none">Orders</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        Column 9
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
