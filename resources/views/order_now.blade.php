<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
                            <li class="nav-item dropdown me-2">
                                <a class="btn btn-outline-success dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">More</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('my_orders') }}">My Orders</a></li>
                                    <li><a class="dropdown-item" href="{{ route('show_cart') }}">My Cart</a></li>
                                </ul>
                            </li>
                            <li class="nav-item me-2">
                                <a href="{{ route('customer_logout') }}" class="btn btn-outline-success">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <label for="state" class="form-label">State:</label>
                <select name="state" id="state" class="form-select">
                    <option value="Select">Select State</option>
                    @if (isset($states))
                        @foreach ($states as $state)
                            <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-sm-6">
                <label for="city" class="form-label">City:</label>
                <select name="city" id="city" class="form-select">
                    <option value="Select">Select City</option>
                </select>
            </div>
        </div>

        <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="restaurantList">
        </section>

        <section class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="foodItemsSection">
        </section>

        <div id="selectedItemsSummary" class="mt-3" style="display:none;">
            <button class="btn btn-primary" id="proceedToOrder">Proceed to Order</button>
        </div>

        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">Order Summary</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="orderModalBody">
                    </div>
                    <div class="modal-footer" id="orderModalFooter">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form id="razorpay-form" method="POST" action="/handlepayment">
                            @csrf
                            <button id="razorpay-button" class="btn btn-success">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
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
    <script>
        $(document).ready(function() {
            $('#state').change(function() {
                var state_id = $(this).val();
                $.ajax({
                    url: "{{ url('/fetch-cities') }}/" + state_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#city').empty();
                        $('#city').append('<option value="Select">Select City</option>');
                        $.each(data.cities, function(index, city) {
                            $('#city').append('<option value="' + city.city_id + '">' +
                                city.city_name + '</option>');
                        });
                    }
                })
            });

            $("#city").change(function() {
                var city_id = $(this).val();
                $.ajax({
                    url: "{{ url('/get-restaurants') }}",
                    type: 'GET',
                    data: {
                        city: city_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#restaurantList').empty();
                        if (data.restaurants.length > 0) {
                            $.each(data.restaurants, function(index, restaurant) {
                                $('#restaurantList').append(`
                                <div class="row mt-3">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">${restaurant.restaurant_name}</h5>
                                            <p class="card-text restaurant-name" style="display:none;">${restaurant.restaurant_name}</p>
                                            <p class="card-text">Vendor Name: ${restaurant.owner_name}</p>
                                            <button class="btn btn-primary get-menu-button" data-restaurant-name="${restaurant.restaurant_name}" data-vendor-id="${restaurant.vendor_id}">Get Menu</button>
                                        </div>
                                    </div>
                                </div>
                            `);
                            });
                        } else {
                            $('#restaurantList').append(
                                '<p class="text-body text-center p-5 m-5">No restaurants found.</p>'
                            );
                        }
                    }
                });
            });
            $(document).on('click', '.get-menu-button', function() {
                let vendorId = $(this).data('vendor-id');
                let restaurantName = $(this).data('restaurant-name');
                $('#restaurantList .row').hide();
                $.ajax({
                    url: "{{ url('/restaurants/menu') }}",
                    type: 'GET',
                    data: {
                        restaurant_name: restaurantName,
                        vendor_id: vendorId
                    },
                    success: function(data) {
                        if (data.foodItems) {
                            let menuHtml = '';
                            data.foodItems.forEach(item => {
                                menuHtml += `
                                    <div class="col">
                                        <div class="card">
                                            ${item.image_path ? `<img src="{{ url('images/') }}/${item.image_path}" class="card-img-top" alt="${item.name}" height="300px">` : ''}
                                            <div class="card-body">
                                                <h5 class="card-title">${item.name}</h5>
                                                <p class="card-text restaurant-name" style="display:none;">${restaurantName}</p>
                                                <p class="card-text">Price: ₹${item.price}</p>
                                                Quantity: <input type="number" class="form-control quantity-input m-1" value="1" min="1">
                                                <div>
                                                    <input class="form-check-input select-item" type="checkbox" value="${item.item_id}" id="item-${item.item_id}">
                                                    <label class="form-check-label" for="item-${item.item_id}">Select</label>
                                                </div>
                                                <form action="/add-to-cart/${item.item_id}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $('#foodItemsSection').html(`
                                <button class="btn btn-secondary" id="backButton">Back</button>
                                <div class="row row-cols-1 row-cols-md-3 g-4">${menuHtml}</div>
                            `);
                            $('#backButton').on('click', function() {
                                $('#foodItemsSection').empty();
                                $('#restaurantList .row').show();
                            });

                            function displaySelectedItems() {
                                let selectedItems = [];
                                $('.select-item:checked').each(function() {
                                    let itemId = $(this).val();
                                    let quantity = $(this).closest('.card-body').find(
                                        '.quantity-input').val();
                                    let itemName = $(this).closest('.card-body').find(
                                        '.card-title').text();
                                    let itemPrice = $(this).closest('.card-body').find(
                                        '.card-text').filter(function() {
                                        return $(this).text().includes(
                                            'Price:');
                                    }).text().replace('Price: ₹', '');

                                    selectedItems.push({
                                        item_id: itemId,
                                        quantity: quantity,
                                        item_name: itemName,
                                        item_price: itemPrice
                                    });
                                });
                                let summaryHtml = '<h4>Selected Items:</h4><ul>';
                                let total = 0;
                                selectedItems.forEach(item => {
                                    let itemTotal = item.item_price * item.quantity;
                                    total += itemTotal;
                                    summaryHtml +=
                                        `<li>${item.item_name} (Qty: ${item.quantity}) - ₹${itemTotal}</li>`;
                                });
                                summaryHtml += `</ul><p>Total: ₹${total}</p>`;
                                if (selectedItems.length > 0) {
                                    $('#selectedItemsSummary').show();
                                } else {
                                    $('#selectedItemsSummary').hide();
                                }
                                $('#selectedItemsSummary').data('selected-items',
                                    selectedItems);
                            }
                            $(document).on('change', '.select-item', function() {
                                displaySelectedItems();
                            });
                            displaySelectedItems();
                        } else if (data.error) {
                            $('#foodItemsSection').html(`<p>${data.error}</p>`);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching menu:", error);
                        alert("Failed to fetch menu. Please try again.");
                    }
                });
            });

            $(document).on('click', '#proceedToOrder', function() {
                let selectedItems = $('#selectedItemsSummary').data('selected-items');
                let modalBody = $('#orderModalBody');
                modalBody.empty();
                let grandTotal = 0;
                selectedItems.forEach(item => {
                    let itemTotal = item.item_price * item.quantity;
                    grandTotal += itemTotal;
                    modalBody.append(
                        `<p>${item.item_name} (Qty: ${item.quantity}) - ₹${itemTotal}</p>`);
                });
                modalBody.append(`<p>Grand Total: ₹${grandTotal}</p>`);
                $('#orderModal').modal('show');

                $('#razorpay-button').off('click').on('click', function(e) {
                    e.preventDefault();
                    let selectedItems = $('#selectedItemsSummary').data('selected-items');
                    let totalAmount = 0;

                    selectedItems.forEach(item => {
                        totalAmount += item.item_price * item.quantity;
                    });

                    let options = {
                        "key": "{{ env('RAZOR_KEY') }}",
                        "amount": totalAmount * 100,
                        "currency": "INR",
                        "name": "TravelBite",
                        "description": "Order Payment",
                        "handler": function (response) {
                            let form = $('#razorpay-form');
                            form.append('<input type="hidden" name="razorpay_payment_id" value="' + response.razorpay_payment_id + '">');
                            form.append('<input type="hidden" name="total_amount" value="' + totalAmount + '">');
                            form.append('<input type="hidden" name="items" value=' + JSON.stringify(selectedItems) + '\>');
                            form.submit();
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    let rzp = new Razorpay(options);
                rzp.open();
            });

            });
        });
    </script>
</body>

</html>
