{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>
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
                            @if (Auth::guard('customers')->check())
                                <h4 class="text-success">Welcome, {{ Auth::guard('customers')->user()->name }}</h4>
                            @endif
                        </li>
                        @guest('customers')
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
                        @auth('customers')
                            <li class="nav-item me-2">
                                <a href="{{ route('customer_logout') }}" class="btn btn-outline-success">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="back-button m-2">
            <a href="{{ route('order_now') }}" class="btn btn-secondary m-2">Back</a>
        </div>
    </header>
    <main>
        <section>
            <h1 class="text-center m-3">My Orders</h1>
            @if (count($orders) > 0)
                <div class="table-responsive m-3">
                    <table class="table table-striped table-bordered p-3">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @if ($order->order_status != 'canceled')
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->food_name }}</td>
                                        <td>{{ $order->food_price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>
                                            @if ($order->order_status == 'pending' || $order->order_status == 'accepted')
                                                <form action="{{ route('cancel_order', $order->order_id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">No orders found.</p>
            @endif
        </section>
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
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>
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
                            @if (Auth::guard('customers')->check())
                                <h4 class="text-success">Welcome, {{ Auth::guard('customers')->user()->name }}</h4>
                            @endif
                        </li>
                        @guest('customers')
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
                        @auth('customers')
                            <li class="nav-item me-2">
                                <a href="{{ route('customer_logout') }}" class="btn btn-outline-success">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="back-button m-2">
            <a href="{{ route('order_now') }}" class="btn btn-secondary m-2">Back</a>
        </div>
    </header>
    <main>
        <section>
            <h1 class="text-center m-3">My Orders</h1>
            @if (count($orders) > 0)
                <div class="table-responsive m-3">
                    <table class="table table-striped table-bordered p-3">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @if ($order->order_status != 'canceled')
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->food_name }}</td>
                                        <td>{{ $order->food_price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>
                                            @if ($order->order_status == 'pending' || $order->order_status == 'accepted')
                                                <form action="{{ route('cancel_order', $order->order_id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                                                </form>
                                                <button type="button" class="btn btn-success mt-1" data-bs-toggle="modal"
                                                    data-bs-target="#billModal{{ $order->order_id }}">
                                                    Generate Bill
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Bill Modal -->
                                    <div class="modal fade" id="billModal{{ $order->order_id }}" tabindex="-1"
                                        aria-labelledby="billModalLabel{{ $order->order_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="billModalLabel{{ $order->order_id }}">
                                                        Bill for Order ID: {{ $order->order_id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Food Items</h5>
                                                    <ul>
                                                        <li><strong>{{ $order->food_name }}</strong> - Quantity: {{ $order->quantity }} - Price: {{ $order->food_price }}</li>
                                                    </ul>
                                                    <p><strong>Total Amount: </strong>{{ $order->total_amount }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">No orders found.</p>
            @endif
        </section>
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
</body>

</html>
