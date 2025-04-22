<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Dashboard</title>
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
                {{-- <form class="d-flex flex-grow-1 mt-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form> --}}
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
    </header>
    <main>
        <section id="order-now" class="mt-0"
            style="background-image: url('{{ asset('images/background-image.jpg') }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
            <div class="container h-100 d-flex justify-content-center align-items-center text-white">
                <div class="p-4 bg-dark rounded">
                    <h1>Order Now!</h1>
                    <p>Delicious food delivered right to your train seat.</p>
                    <a href="#order" class="btn btn-success p-1">Order Now</a>
                </div>
            </div>
        </section>

        <section id="register-vendor">
            <div class="container-fluid alert alert-success text-center mt-5">
                <h2>Are you a restaurant owner? Register with us as a vendor</h2>
                <p>Partner with us and make sound revenue by delivering food in train from our channel...</p>
                <a href="vendor-register" class="btn btn-outline-success p-1">Register</a>
            </div>
        </section>

        <section id="order">
            <div class="container mt-5 w-50">
                <div class="alert alert-light">
                    <h5 class="text-center">Select Your Option</h5>
                    <form id="orderForm">
                        <div class="d-flex justify-content-evenly">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="optSelect" id="option1"
                                    value="pnr" onclick="toggleTextBox()">
                                <label class="form-check-label" for="option1">PNR Number</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="optSelect" id="option2"
                                    value="train" onclick="toggleTextBox()">
                                <label class="form-check-label" for="option2">Train Number</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" id="pnrTextbox" class="form-control mt-3"
                                placeholder="Enter your PNR Number" style="display: none;">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" id="trainTextbox" class="form-control mt-3"
                                placeholder="Enter your Train Number" style="display: none;">
                        </div>
                        <small class="d-flex justify-content-start">
                            <div id="errorMessage" class="text-danger text-center mt-2" style="display: none;"></div>
                        </small>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="button" id="orderButton" class="btn btn-success p-1 mt-3">Order Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="faqs">
            <div class="container mt-5">
                <div class="accordion" id="FAQaccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                What are the varities available?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#FAQaccordion">
                            <div class="accordion-body">
                                <strong>
                                    Our app offers a wide range of food options, including regional specialties,
                                    international cuisines, diet-specific meals, quick bites, beverages, desserts, combo
                                    meals, and a special kids menu, ensuring a delightful dining experience for all
                                    passengers.
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What payment modes are available for payment?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>
                                    Our app supports multiple payment modes UPI or cash on delivery.
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Where can I get the discount coupon?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>
                                    You can get discount coupons through our app promotions, email newsletters, partner
                                    collaborations, and social media channels.
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can I order food on the train without PNR number?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>
                                    No, a valid PNR number is required to place an order on our app to ensure accurate
                                    delivery to your seat on the train.
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Where can I get the discount coupon?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>
                                    You can get discount coupons from our app's promotions section, email newsletters,
                                    partner websites, and our social media pages.
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Can I cancel my food order?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>
                                    Yes, you can cancel your food order through the app, but please check our
                                    cancellation
                                    policy for time limits and potential charges.
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('document').ready(function() {
            $('#option1').change(function() {
                if ($(this).is(':checked')) {
                    pnrTextbox.style.display = 'block';
                    trainTextbox.style.display = 'none';
                }
            });

            $('#option2').change(function() {
                if ($(this).is(':checked')) {
                    trainTextbox.style.display = 'block';
                    pnrTextbox.style.display = 'none';
                }
            });

            $('#orderButton').click(function(event) {
                event.preventDefault();

                $('#errorMessage').hide();
                $('#errorMessage').text('');

                let isValid = true;
                let inputValue = '';

                if ($('#option1').is(':checked')) {
                    inputValue = $('#pnrTextbox').val().trim();
                    if (inputValue === '') {
                        $('#errorMessage').text('Please enter your PNR Number.').show();
                        isValid = false;
                    }
                } else if ($('#option2').is(':checked')) {
                    inputValue = $('#trainTextbox').val().trim();
                    if (inputValue === '') {
                        $('#errorMessage').text('Please enter your Train Number.').show();
                        isValid = false;
                    }
                } else {
                    $('#errorMessage').text('Please select an option.').show();
                    isValid = false;
                }

                if(isValid) {
                    window.location.href = "{{ route('order_now') }}";
                }


            });
        });
    </script>
</body>

</html>
