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
                <form action="{{ url('/vendor-register') }}" method="POST">
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
                    <div class="mb-3">
                        <label for="conf_vendor_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="conf_vendor_password"
                            name="conf_vendor_password" placeholder="Enter Your Password Again">
                        <span class="text-danger">
                            @error('conf_vendor_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        @php
                            $indianStates = [
                                'AP' => 'Andhra Pradesh',
                                'AR' => 'Arunachal Pradesh',
                                'AS' => 'Assam',
                                'BR' => 'Bihar',
                                'CT' => 'Chhattisgarh',
                                'GA' => 'Goa',
                                'GJ' => 'Gujarat',
                                'HR' => 'Haryana',
                                'HP' => 'Himachal Pradesh',
                                'JK' => 'Jammu and Kashmir',
                                'JH' => 'Jharkhand',
                                'KA' => 'Karnataka',
                                'KL' => 'Kerala',
                                'MP' => 'Madhya Pradesh',
                                'MH' => 'Maharashtra',
                                'MN' => 'Manipur',
                                'ML' => 'Meghalaya',
                                'MZ' => 'Mizoram',
                                'OR' => 'Odisha',
                                'PB' => 'Punjab',
                                'RJ' => 'Rajasthan',
                                'SK' => 'Sikkim',
                                'TN' => 'Tamil Nadu',
                                'TG' => 'Telangana',
                                'TR' => 'Tripura',
                                'UP' => 'Uttar Pradesh',
                                'UT' => 'Uttarakhand',
                                'WB' => 'West Bengal',
                                'AN' => 'Andaman and Nicobar Islands',
                                'CH' => 'Chandigarh',
                                'DN' => 'Dadra and Nagar Haveli',
                                'DD' => 'Daman and Diu',
                                'LD' => 'Lakshadweep',
                                'DL' => 'National Capital Territory of Delhi',
                                'PY' => 'Puducherry',
                            ];
                        @endphp
                        <label for="state" class="form-label">State:</label>
                        <select id="state" name="state" class="form-control">
                            <option value="select">Select State</option>
                            @foreach ($indianStates as $states)
                                <option value="{{ $states }}">{{ $states }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        @php
                            $cities = [
                                'Andhra Pradesh (AP)' => ['Chittoor','Kurnool','Nizamabad','Hyderabad','Visakhapatnam'],
                                'Arunachal Pradesh (AR)' => ['Anjaw', 'Changlang', 'Lohit', 'Tawang', 'Tirap'],
                                'Assam (AS)' => ['Barpeta', 'Dhubri', 'Jorhat', 'Lakhimpur', 'Sonitpur'],
                                'Bihar (BR)' => ['Arwal', 'Aurangabad', 'Bhojpur', 'Patna', 'Chandigarh'],
                                'Chhattisgarh (CG)' => ['Bastar', 'Bijapur', 'Bilaspur', 'Raigarh', 'Raipur'],
                                'Dadra and Nagar Haveli (DN)' => ['Dadra and Nagar Haveli'],
                                'Daman and Diu (DD)' => ['Daman', 'Diu'],
                                'Delhi (DL)' => ['East Delhi', 'New Delhi', 'North Delhi', 'South Delhi', 'West Delhi'],
                                'Goa (GA)' => ['North Goa', 'South Goa'],
                                'Gujarat (GJ)' => ['Ahmedabad', 'Anand', 'Bharuch', 'Gandhinagar', 'Vadodara'],
                                'Haryana (HR)' => ['Ambala', 'Panipat', 'Rohtak', 'Sonipat', 'Yamuna Nagar'],
                                'Himachal Pradesh (HP)' => ['Bilaspur', 'Kullu', 'Mandi', 'Shimla', 'Solan'],
                                'Jammu and Kashmir (JK)' => ['Jammu', 'Kargil', 'Leh', 'Pulwama', 'Srinagar'],
                                'Jharkhand (JH)' => ['Dumka', 'Garhwa', 'Jamtara', 'Ramgarh', 'Ranchi'],
                                'Karnataka (KA)' => ['Bangalore Urban', 'Kolar', 'Koppal', 'Mandya', 'Mysore'],
                                'Kerala (KL)' => ['Alappuzha', 'Kannur', 'Kollam', 'Thrissur', 'Thiruvananthapuram'],
                                'Madhya Pradesh (MP)' => ['Gwalior', 'Indore', 'Mandla', 'Ratlam', 'Ujjain'],
                                'Maharashtra (MH)' => ['Mumbai City', 'Nagpur', 'Nashik', 'Pune', 'Thane'],
                                'Manipur (MN)' => ['Bishnupur', 'Chandel', 'Imphal East', 'Senapati', 'Imphal West'],
                                'Meghalaya (ML)' => ['East Garo Hills','East Khasi Hills','South Garo Hills','West Garo Hills','West Khasi Hills'],
                                'Mizoram (MZ)' => ['Aizawl', 'Champhai', 'Kolasib', 'Mamit', 'Saiha'],
                                'Orissa (OR)' => ['Angul', 'Jajpur', 'Nayagarh', 'Puri', 'Rayagada'],
                                'Pondicherry (Puducherry) (PY)' => ['Karaikal', 'Mahe', 'Pondicherry', 'Yanam'],
                                'Punjab (PB)' => ['Amritsar', 'Bathinda', 'Jalandhar', 'Ludhiana', 'Patiala'],
                                'Rajasthan (RJ)' => ['Jodhpur', 'Jaipur', 'Jaisalmer', 'Kota', 'Udaipur'],
                                'Sikkim (SK)' => ['East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'],
                                'Tamil Nadu (TN)' => ['Chennai', 'Coimbatore', 'Kanyakumari', 'Madurai', 'Vellore'],
                                'Tripura (TR)' => ['Dhalai','North Tripura','South Tripura','Khowai','West Tripura'],
                                'Uttar Pradesh (UP)' => ['Agra', 'Lucknow', 'Meerut', 'Mathura', 'Varanasi'],
                                'Uttarakhand (UK)' => ['Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pithoragarh'],
                                'West Bengal (WB)' => ['Darjeeling', 'Kolkata', 'Maldah', 'Murshidabad', 'Nadia'],
                            ];
                        @endphp
                        <label for="city" class="form-label">City:</label>
                        <select id="city" name="city" class="form-control">
                            <option value="select">Select City</option>
                            @foreach ($cities as $city)
                                @foreach ($city as $c)
                                    <option value="{{ $c }}">{{ $c }}</option>
                                @endforeach
                            @endforeach
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

    <footer>
        <div class="container">
            <ul class="list-unstyled">
                <div class="row text-center">
                    <li class="col-3"><a href="about-us" class="text-body text-decoration-none">About Us</a></li>
                    <li class="col-3"><a href="privacy-policy" class="text-body text-decoration-none">Privacy
                            Policy</a></li>
                    <li class="col-3"><a href="terms-conditions" class="text-body text-decoration-none">Terms and
                            Conditions</a></li>
                    <li class="col-3"><a href="contact-us" class="text-body text-decoration-none">Contact Us</a>
                    </li>
                </div>
            </ul>
            <p class="text-center">&copy;TravelBite. 2025-All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
