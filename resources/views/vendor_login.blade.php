<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-body-tertiary">
            <div class="container-fluid d-flex">
                <a class="navbar-brand flex-grow-1" href="/vendor">TravelBite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-links"
                    aria-controls="nav-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="nav-links">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown me-2">
                            <a class="btn btn-outline-success dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="customer-login">Customer Login</a></li>
                                <li><a class="dropdown-item" href="vendor-login">Vendor Login</a></li>
                                <li><a class="dropdown-item" href="admin-login">Admin Login</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-success" href="add_item">Add Items</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-success" href="view_orders">View Orders</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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

    <footer class="fixed-bottom">
        <div class="container">
            <ul class="list-unstyled">
                <div class="row text-center">
                    <li class="col-3"><a href="about-us" class="text-body text-decoration-none">About Us</a></li>
                    <li class="col-3"><a href="privacy-policy" class="text-body text-decoration-none">Privacy
                            Policy</a></li>
                    <li class="col-3"><a href="terms-conditions" class="text-body text-decoration-none">Terms and
                            Conditions</a></li>
                    <li class="col-3"><a href="contact-us" class="text-body text-decoration-none">Contact Us</a></li>
                </div>
            </ul>
            <p class="text-center">&copy;TravelBite. 2025-All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
