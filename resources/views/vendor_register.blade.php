<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Registration</title>
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
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="alert alert-light m-5">
                <form action="{{ route('vendor_save') }}" method="POST">
                    @csrf
                    <h1 class="text-center">Register Here!</h1>
                    <p class="text-center">Please fill the details below to get registered and deliver on stations.</p>
                    <div class="mb-3">
                        <label for="owner_name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name"
                            placeholder="Enter Your Name">
                        <span class="text-danger">
                            @error('owner_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant_name" class="form-label">Restaurant Name:</label>
                        <input type="text" class="form-control" id="resaurant_name" name="restaurant_name"
                            placeholder="Enter Your Restaurant Name">
                        <span class="text-danger">
                            @error('restaurant_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number:</label>
                        <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                            placeholder="Enter Your Mobile Number">
                        <span class="text-danger">
                            @error('mobile_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
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
                    {{-- <div class="mb-3">
                        <label for="conf_vendor_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="conf_vendor_password" name="conf_vendor_password"
                            placeholder="Enter Your Password Again">
                        <span class="text-danger">
                            @error('conf_vendor_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div> --}}
                    <div class="mb-3">
                        <label for="state" class="form-label">State:</label>
                        <select name="state" id="state" class="form-select">
                            <option value="Select">Select State</option>
                            @if (isset($states))
                                @foreach ($states as $state)
                                    <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-danger">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City:</label>
                        <select name="city" id="city" class="form-select">
                            <option value="Select">Select City</option>
                        </select>
                        <span class="text-danger">
                            @error('city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="gst_number" class="form-label">GST Number:</label>
                        <input type="number" class="form-control" id="gst_number" name="gst_number"
                            placeholder="Enter Your GST Number">
                        <span class="text-danger">
                            @error('gst_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <a href="vendor-login" class="d-flex justify-content-end text-decoration-none"><small>Already
                                Registered?Login Here.</small></a>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
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
            $('#state').change(function(){
                var state_id = $(this).val();
                console.log("Selected State ID:", state_id);
                $.ajax({
                    url: '{{ url("/fetch-cities") }}/' + state_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log("Cities fetched:", data);
                        $('#city').empty();
                        $('#city').append('<option value="Select">Select City</option>');
                        $.each(data.cities, function(index, city){
                            $('#city').append('<option value="'+city.city_id+'">'+city.city_name+'</option>');
                        });
                    }
                })
            });
        });
    </script>
</body>

</html>
