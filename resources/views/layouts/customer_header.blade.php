<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-body-tertiary">
            <div class="container-fluid d-flex">
                <a class="navbar-brand flex-grow-1" href="/">TravelBite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-links"
                    aria-controls="nav-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="d-flex flex-grow-1 mt-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <div class="collapse navbar-collapse justify-content-end" id="nav-links">
                    <ul class="navbar-nav">
                        <li class="d-flex align-items-center text-success me-2">
                            @if (Auth::guard('customers')->check())
                                <p>Welcome, {{ Auth::guard('customers')->user()->name }}</p>
                            @endif
                        </li>
                        <li class="nav-item dropdown me-2">
                            <a class="btn btn-outline-success dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="customer-login">Customer Login</a></li>
                                <li><a class="dropdown-item" href="vendor-login">Vendor Login</a></li>
                                <li><a class="dropdown-item" href="admin-login">Admin Login</a></li>
                            </ul>
                        </li>
                        @auth('customers')
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-success" href="group_orders">Group Orders</a>
                            </li>
                            <li>
                                <form action="{{ route('logout_customer') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>
