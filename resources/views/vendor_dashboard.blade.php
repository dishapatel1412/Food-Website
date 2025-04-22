<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Dashboard</title>
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
                            {{-- @if (Auth::guard('vendors')->check())
                                <h4 class="text-success">Welcome, {{ Auth::guard('vendors')->user()->owner_name }}</h4>
                            @endif --}}
                        </li>
                        @guest('vendors')
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
                        @auth('vendors')
                            <li class="nav-item me-2">
                                <a href="{{ route('vendor_logout') }}" class="btn btn-outline-success">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar p-4">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3"><a href="{{ route('display_items') }}" class="nav-link text-body"
                            id="myProfileLink">My Profile</a></li>
                    <li class="nav-item mb-3"><a href="#" class="nav-link text-body" data-bs-toggle="modal"
                            data-bs-target="#additems">Add Items</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('view_orders') }}" class="nav-link text-body"
                            id="showOrdersLink">View Orders</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('past_orders') }}" class="nav-link text-body"
                            id="showPastOrders">Past Orders</a></li>
                    <li class="nav-item mb-3"><a href="{{ route('get_trashed_items') }}" id="showTrashLink"
                            class="nav-link text-body">Trashed
                            Items</a></li>
                </ul>
            </nav>

            <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @if (Auth::guard('vendors')->check())
                    <h1 class="text-success">Welcome, {{ Auth::guard('vendors')->user()->owner_name }}</h1>
                @endif
                <div class="row">
                    @if (isset($activeTab) && $activeTab === 'myProfile')
                        <div id="itemContainer">
                            <h2 id="pageTitle">My Items</h2>
                            @if (isset($items) && count($items) > 0 && isset($vendor))
                                <div class="row">
                                    @foreach ($items as $item)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <img src="{{ url('images/' . $item->image_path) }}" class="card-img-top"
                                                    alt="{{ $item->name }}" height="300px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                    <p class="card-text">Price: ₹{{ $item->price }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <form action="{{ route('trash', $item->item_id) }}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No Items Found</p>
                            @endif
                        </div>
                    @elseif (isset($activeTab) && $activeTab === 'viewOrders')
                        <div id="orderContainer">
                            <h2 id="orderTitle">View Orders</h2>
                            @if (isset($activeTab) && $activeTab === 'viewOrders')
                                <div id="orderContainer">
                                    <table id="ordersTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Customer Name</th>
                                                <th>Order Status</th>
                                                <th>Order Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ordersTableBody">
                                            @if (isset($orders) && $orders->isNotEmpty())
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->food_item_name }}</td>
                                                        <td>{{ $order->customer_name }}</td>
                                                        <td>
                                                            <select class="form-select"
                                                                onchange="updateOrderStatus(this, '{{ $order->order_id }}')"
                                                                {{ $order->order_status === 'delivered' ? 'disabled' : '' }}>
                                                                <option value="pending"
                                                                    {{ $order->order_status == 'pending' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="accepted"
                                                                    {{ $order->order_status == 'accepted' ? 'selected' : '' }}>
                                                                    Accepted</option>
                                                                <option value="delivered"
                                                                    {{ $order->order_status == 'delivered' ? 'selected' : '' }}>
                                                                    Delivered</option>
                                                            </select>
                                                        </td>
                                                        <td>{{ $order->order_date }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">No orders found.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    @elseif (isset($activeTab) && $activeTab === 'trashedItems')
                        <div id="trashContainer">
                            <h2 id="pageTitle">Trashed Items</h2>
                            <div id="trashedItemsList">
                                @if (isset($trashedItems) && $trashedItems->isNotEmpty())
                                    @foreach ($trashedItems as $item)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">Price: ₹{{ $item->price }}</p>
                                                <form action="{{ route('restore', $item->item_id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Restore</button>
                                                </form>
                                                <form action="{{ route('delete', $item->item_id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-danger">Delete
                                                        Permanently</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No trashed items.</p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </main>

    {{-- modal to add new items --}}
    <div class="modal" tabindex="-1" id="additems">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Item Here</h5>
                </div>
                <form action="{{ route('add_items') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="foodName" name="foodName"
                                placeholder="Enter Name">
                            <span class="text-danger">
                                @error('foodName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-1">
                            <label for="food-price" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="foodPrice" name="foodPrice"
                                placeholder="Enter Price">
                            <span class="text-danger">
                                @error('foodPrice')
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
    <footer class="fixed-bottom mt-3">
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
    <script>
        function updateOrderStatus(selectElement, orderId) {
            var newStatus = selectElement.value;
            var selectElement = $(selectElement);

            $.ajax({
                url: '/update-order-status/' + orderId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        alert('Order status updated successfully!');
                        if (newStatus === 'delivered') {
                            selectElement.prop('disabled', true);
                        } else {
                            selectElement.prop('disabled', false);
                        }
                    } else {
                        alert('Failed to update order status.');
                    }
                },
                error: function() {
                    alert('An error occurred.');
                }
            });
        }
    </script>
</body>

</html>
