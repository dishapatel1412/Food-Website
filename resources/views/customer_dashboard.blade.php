@extends('layouts.main')
@php
    $title='Customer Dashboard';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <section id="order-now" class="mt-0"
            style="background-image: url('{{ asset('images/food-pic.jpg') }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
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
                    <div class="d-flex justify-content-evenly">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optSelect" id="option1">
                            <label class="form-check-label" for="option1">PNR Number</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="optSelect" id="option2">
                            <label class="form-check-label" for="option2">Train Number</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="order" class="btn btn-success p-1">Order</a>
                    </div>
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
                                    Yes, you can cancel your food order through the app, but please check our cancellation
                                    policy for time limits and potential charges.
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
