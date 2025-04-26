{{-- <!DOCTYPE html>
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
                    <ul class="navbar-nav">>
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
                    <li class="nav-item mb-3"><a href="{{ route('all_sales_reports') }}" class="nav-link text-body"
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
                                                    <form action="{{ route('approve_vendor', $vendor->vendor_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success">Approve</button>
                                                    </form>
                                                    <form action="{{ route('reject_vendor', $vendor->vendor_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Reject</button>
                                                    </form>
                                                @else
                                                    <span
                                                        class="badge bg-{{ $vendor->is_approved === 'approved' ? 'success' : 'danger' }}">{{ ucfirst($vendor->is_approved) }}</span>
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

                @if (isset($activeTab) && $activeTab == 'allSalesReports')
                    <h2>Sales Reports</h2>
                    <form action="{{ route('all_sales_reports') }}" method="GET" class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="city" class="form-label">Filter by City:</label>
                                <select class="form-select" name="city" id="city">
                                    <option value="">All Cities</option>
                                    @if (isset($cities))
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city_name }}"
                                                {{ isset($selectedCity) && $selectedCity == $city->city_name ? 'selected' : '' }}>
                                                {{ $city->city_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mt-4">Filter</button>
                            </div>
                        </div>
                    </form>

                    @if (isset($selectedCity))
                        <div class="mt-4">
                            <button type="submit" name="report_type" value="weekly" class="btn btn-primary">Weekly
                                Sales</button>
                            <button type="submit" name="report_type" value="monthly" class="btn btn-secondary">Monthly
                                Sales</button>
                        </div>
                    @endif

                    <hr>

                    @if (isset($reportType) && $reportType == 'weekly')
                        <h2>Weekly Sales Report</h2>
                        @if (isset($weeklySales) && count($weeklySales) > 0)
                            <h3>Weekly Sales for {{ $selectedCity ?? 'All Cities' }}</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Restaurant Name</th>
                                        <th>Total Sales (This Week)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($weeklySales as $sale)
                                        <tr>
                                            <td>{{ $sale->restaurant_name }}</td>
                                            <td>{{ $sale->total_sales }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif (isset($weeklySales))
                            <p>No weekly sales data available for the selected city.</p>
                        @endif
                    @endif

                    @if (isset($reportType) && $reportType == 'monthly')
                        <h2>Monthly Sales Report</h2>
                        @if (isset($monthlySales) && count($monthlySales) > 0)
                            <h3>Monthly Sales for {{ $selectedCity ?? 'All Cities' }}</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Restaurant Name</th>
                                        <th>Total Sales (This Month)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monthlySales as $sale)
                                        <tr>
                                            <td>{{ $sale->restaurant_name }}</td>
                                            <td>{{ $sale->total_sales }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif (isset($monthlySales))
                            <p>No monthly sales data available for the selected city.</p>
                        @endif
                    @endif
                @endif
            </section>
        </div>
    </main>
    <footer>
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

</html> --}}
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
                    <li class="nav-item mb-3"><a href="{{ route('sales_report') }}"
                            class="nav-link text-body" id="totalsales">Total Sales</a></li>
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
                                                    <form action="{{ route('approve_vendor', $vendor->vendor_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success">Approve</button>
                                                    </form>
                                                    <form action="{{ route('reject_vendor', $vendor->vendor_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Reject</button>
                                                    </form>
                                                @else
                                                    <span
                                                        class="badge bg-{{ $vendor->is_approved === 'approved' ? 'success' : 'danger' }}">{{ ucfirst($vendor->is_approved) }}</span>
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

                @if (isset($activeTab) && $activeTab == 'salesReport')
                    <h2>Select City</h2>
                    <form action="{{ route('sales_report') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="city" class="form-label">City:</label>
                            <select name="city" id="city" class="form-select" onchange="this.form.submit()">
                                <option value="">Select City</option>
                                @foreach ($cities as $c)
                                    <option value="{{ $c->city_name }}"
                                        {{ isset($city) && $city == $c->city_name ? 'selected' : '' }}>
                                        {{ $c->city_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    @if (isset($city) && $city !== '')
                        <h2>Select Report Type</h2>
                        <form action="{{ route('sales_report') }}" method="POST">
                            @csrf
                            <input type="hidden" name="city" value="{{ $city }}">
                            <div class="mb-3">
                                <label for="report_type" class="form-label">Report Type</label>
                                <select name="report_type" id="report_type" class="form-select" required>
                                    <option value="">Select Report Type</option>
                                    <option value="weekly"
                                        {{ isset($report_type) && $report_type == 'weekly' ? 'selected' : '' }}>
                                        Weekly</option>
                                    <option value="monthly"
                                        {{ isset($report_type) && $report_type == 'monthly' ? 'selected' : '' }}>
                                        Monthly</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Generate Report</button>
                        </form>
                    @endif

                    @if (isset($sales) && count($sales) > 0)
                        <h2 class="mt-4">Sales Report</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Date</th>
                                        <th>City</th>
                                        <th>Total Orders</th>
                                        <th>Total Sales (₹)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->order_date }}</td>
                                            <td>{{ $sale->city }}</td>
                                            <td>{{ $sale->total_orders }}</td>
                                            <td>{{ number_format($sale->total_sales, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @elseif(isset($report_type))
                        <p class="text-danger">No sales data found for this period.</p>
                    @endif

                @endif
            </section>
        </div>
    </main>
    <footer>
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
