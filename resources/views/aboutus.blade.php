@extends('layouts.admin_main')
@php
    $title = 'About Us';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="col border border-3 rounded p-5">
                <h1 class="text-center">About Us</h1>
                <pre class="p-3">
                    Welcome to TravrlBite, your go-to platform for delicious meals on the move! We understand the challenges of
                    finding fresh and quality food while traveling by train. That's why we bring you a seamless and hassle-free way
                    to order food from your favorite restaurants and have it delivered right to your seat.

                    Why Choose Us?
                    - Wide Variety of Cuisines: From local delicacies to popular fast food, we offer a diverse menu to suit every
                    traveler's taste.
                    - Trusted Partner Restaurants: We collaborate with top-rated restaurants to ensure fresh, hygienic, and tasty
                    meals.
                    - Seamless Ordering: Our easy-to-use platform allows you to place an order in just a few clicks.
                    - On-Time Delivery: We ensure your food reaches you at the right station, hot and fresh.

                    Our Mission:
                    Our mission is to enhance your train journey by providing a convenient and delightful food-ordering experience.
                    We are committed to quality, hygiene, and punctuality, ensuring that every traveler enjoys their meal without
                    any hassle.

                    How It Works?
                    1. Enter Your PNR or Train Details
                    2. Browse Menus & Select Your Favorite Dishes
                    3. Place Your Order & Make Payment
                    4. Get Your Food Delivered at Your Seat
                    With TravelBite, your journey becomes tastier and more enjoyable. Sit back, relax, and let us bring delicious
                    meals straight to your seat!

                    Order Now & Savor the Taste of Your Journey!
                </pre>
            </div>
        </div>
    </main>
@endsection
