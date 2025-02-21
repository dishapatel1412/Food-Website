@extends('layouts.admin_main')
@php
    $title='Privacy Policy';
@endphp
<title>{{ $title }}</title>
@section('content')
    <main>
        <div class="container">
            <div class="col border border-3 rounded p-5">
                <h1 class="text-center">Privacy Policy</h1>
                <pre class="p-3">
                    Welcome to TravelBite! Your privacy is important to us, and we are committed to protecting your personal information.
                    This Privacy Policy explains how we collect, use, and safeguard your data when you use our website and services.

                    1. Information We Collect
                    When you use Order Food on Rails, we may collect the following types of information:
                    Personal Information
                    - Name
                    - Contact details (email, phone number)
                    - Delivery address (train details, PNR number, seat/coach details)
                    - Payment information (processed securely through third-party payment gateways)

                    2. How We Use Your Information
                    We use the collected information to:
                    - Process and deliver your food orders efficiently.
                    - Improve our services and user experience.
                    - Send updates, promotions, or important notifications.
                    - Ensure security and prevent fraudulent activities.

                    3. Sharing of Information
                    We do not sell, trade, or rent your personal data. However, we may share it with:
                    - Partner Restaurants: To fulfill your food orders.
                    - Payment Gateways: For secure payment processing.
                    - Service Providers: For analytics, marketing, and technical support.
                    - Legal Authorities: If required by law.

                    4. Data Security
                    We implement strict security measures to protect your personal data. However, no online transmission or storage
                    system is 100% secure, so we encourage you to use our services responsibly.

                    5. Cookies and Tracking Technologies
                    Our website may use cookies to enhance user experience, analyze site traffic, and personalize content. You can
                    disable cookies in your browser settings, but some features may not function properly.

                    6. Third-Party Links
                    Our website may contain links to third-party websites. We are not responsible for their privacy practices, so we
                    encourage you to review their policies before providing any personal information.

                    7. Your Rights & Choices
                    You have the right to:
                    - Access, update, or delete your personal data.
                    - Opt out of marketing emails or notifications.
                    - Disable cookies and tracking technologies.

                    8. Changes to This Privacy Policy
                    We may update this Privacy Policy from time to time. Any changes will be posted on this page with the updated
                    effective date.
                </pre>
            </div>
        </div>
    </main>
@endsection
