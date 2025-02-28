@extends('layouts.admin_main')
@php
    $title='Terms and Conditions';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="col border border-3 rounded p-5">
                <h1 class="text-center">Terms and Conditions</h1>
                <pre class="p-3">
                    Welcome to TravelBite! These Terms and Conditions ("Terms") govern your use of our website and services.
                    By accessing or using our platform, you agree to comply with these Terms. If you do not agree, please do
                    not use our services.

                    1. Definitions
                    - "Website" refers to TravelBite, accessible at https://www.travelbite.co.in.
                    - "User" refers to anyone accessing or using our platform.
                    - "Restaurant Partner" refers to third-party restaurants that fulfill food orders.
                    - "Order" refers to a food purchase request made by a user.

                    2. Service Overview
                    - Our Website allows users to order food from partner restaurants and have it delivered to their train seats.
                    We act as an intermediary between users and restaurant partners.

                    3. User Responsibilities
                    By using our services, you agree to:
                    - Provide accurate train details (PNR number, seat/coach details) for order delivery.
                    - Use our platform only for lawful purposes.
                    - Make timely payments for orders.
                    - Not engage in fraudulent activities or misuse of services.

                    4. Order Placement & Cancellation
                    Orders must be placed within the available service time and for listed railway stations.
                    Once confirmed, orders cannot be modified or canceled.
                    Refunds are subject to our Refund Policy (refer to Section 6).

                    5. Pricing & Payments
                    Prices are set by restaurant partners and may vary.
                    We reserve the right to modify pricing without prior notice.
                    Payments must be made through our secure payment gateway.

                    6. Refund & Cancellation Policy
                    Refunds will be processed only if:
                    - The order is not delivered due to a fault on our end.
                    - The food is not as described or is delivered in an unsatisfactory condition.
                    - Refunds (if applicable) will be credited to the original payment method within 5 working business days.

                    7. Limitation of Liability
                    We act as a facilitator and are not responsible for the quality, taste, or safety of food provided by
                    partner restaurants. We do not guarantee delivery in cases of train delays, unforeseen circumstances,
                    or force majeure events. In no event shall Order Food on Rails be liable for indirect, incidental, or
                    consequential damages.

                    8. Intellectual Property
                    All content, including logos, text, images, and website design, is the property of TravelBite.
                    Unauthorized use of our intellectual property is strictly prohibited.

                    9. Termination of Service
                    We reserve the right to suspend or terminate any user's access to our services without prior notice for
                    violations of these Terms.

                    10. Governing Law
                    These Terms shall be governed by and construed in accordance with the laws of India.

                    11. Changes to Terms
                    We may update these Terms from time to time. Users will be notified of any significant changes, and
                    continued use of our services constitutes acceptance of the revised Terms.
                </pre>
            </div>
        </div>
    </main>
@endsection
