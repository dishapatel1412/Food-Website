<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-body-tertiary">
            <div class="container-fluid d-flex">
                <a class="navbar-brand flex-grow-1" href="#">TravelBite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-links"
                    aria-controls="nav-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="nav-links">
                    <ul class="navbar-nav">
                        <li class="nav-item me-2">
                            {{-- @if (Auth::guard('admin')->check())
                                <h4 class="text-success">Welcome, {{ Auth::guard('admin')->user()->name }}</h4>
                            @endif --}}
                        </li>
                        @guest('admin')
                            <li class="nav-item dropdown me-2">
                                <a class="btn btn-outline-success dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('customer_login') }}">Customer Login</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('vendor_login') }}">Vendor Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin_login') }}">Admin Login</a></li>
                                </ul>
                            </li>
                        @endguest
                        @auth('admin')
                            <li class="nav-item me-2">
                                <a href="{{ route('admin_logout') }}" class="btn btn-outline-success">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid mt-4">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar p-4">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3"><a href="{{ route('view_vendors') }}" class="nav-link text-body"
                            id="viewvendors">View Vendors</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('view_customers') }}" class="nav-link text-body"
                            id="viewcustomers">View Customers</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('total_sales') }}" class="nav-link text-body"
                            id="totalsales">Total Sales</a></li>
                </ul>
            </nav>

            <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="viewvendors">
                @if (Auth::guard('admin')->check())
                    <h4 class="text-success">Welcome, {{ Auth::guard('admin')->user()->name }}</h4>
                @endif
                <div class="row">
                    @if (isset($activeTab) && $activeTab == 'viewVendors')
                        <h2>List of Registered Vendors</h2>
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Vendor ID</th>
                                    <th>Name</th>
                                    <th>Restaurant Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>GST Number</th>
                                    <th>Accept Vendors</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($vendors))
                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>{{ $vendor->vendor_id }}</td>
                                            <td>{{ $vendor->owner_name }}</td>
                                            <td>{{ $vendor->restaurant_name }}</td>
                                            <td>{{ $vendor->mobile_number }}</td>
                                            <td>{{ $vendor->email }}</td>
                                            <td>{{ $vendor->state }}</td>
                                            <td>{{ $vendor->city }}</td>
                                            <td>{{ $vendor->gst_number }}</td>
                                            <td>
                                                @if ($vendor->is_approved === 'pending')
                                                    <form action="{{ route('approve_vendor', $vendor->vendor_id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                    </form>
                                                    <form action="{{ route('reject_vendor', $vendor->vendor_id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                    </form>
                                                @else
                                                    <span class="badge bg-{{ $vendor->is_approved === 'approved' ? 'success' : 'danger' }}">{{ ucfirst($vendor->is_approved) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif

                    @if (isset($activeTab) && $activeTab == 'viewCustomers')
                        <h2>List of Registered Customers</h2>
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($customers))
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->customer_id }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->mobile_number }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </section>

            <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="viewcustomers">
                <div class="row">

                </div>
            </section>
        </div>
    </main>
    <footer class="mt-3">
        <div class="container">
            <ul class="row list-unstyled text-center">
                <li class="col-4"><a href="about-us" class="text-body text-decoration-none">About Us</a></li>
                <li class="col-4"><a href="privacy-policy" class="text-body text-decoration-none">Privacy
                        Policy</a></li>
                <li class="col-4"><a href="terms-conditions" class="text-body text-decoration-none">Terms and
                        Conditions</a></li>
            </ul>
            <ul class="row list-unstyled text-center mt-3">
                <li class="col-4">
                    <i class="bi bi-envelope" style="margin-right: 3px;"></i>www.travelbite.com
                </li>
                <li class="col-4">
                    <i class="bi bi-telephone" style="margin-right: 3px;"></i>+91 850 111 1515
                </li>
                <li class="col-4">
                    <i class="bi bi-instagram" style="margin-right: 3px;"></i>travelbite
                </li>
            </ul>
            <div class="row text-center mt-3">
                <p>&copy;TravelBite. 2025-All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
