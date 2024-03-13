@extends('layout.layout')
{{-- @section('title', 'Sustainability') --}}

@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Privacy Policy - GreenActions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        .section-padding {
            padding: 100px 0;
        }
    </style>

</head>

<body>


    <section class="section-padding">
        <div class="container">
            <h1 class="text-dark mb-3 text-center" style="font-size:50px;">Privacy Policy</h1>

            <p>This Privacy Policy describes how GreenActions ("we", "us", or "our") collects, uses, and discloses your
                personal information when you use our website (the "Site") and the services offered through the Site
                (the "Services").</p>

            <h2>Information We Collect</h2>

            <p>We may collect the following types of information when you use our Site and Services:</p>

            <ul>
                <li><strong>Personal Information:</strong> When you register for an account, we may collect personal
                    information such as your name, email address, password.</li>
                <li><strong>Usage Information:</strong> We may collect information about how you interact with the Site,
                    including your IP address, browser type, device type, and operating system.</li>
                <li><strong>Payment Information:</strong> If you make purchases through the Site, we may collect payment
                    information such as credit card details.</li>
            </ul>

            <h2>How We Use Your Information</h2>

            <p>We may use your personal information for the following purposes:</p>

            <ul>
                <li>To provide and maintain our Services.</li>
                <li>To process transactions and payments.</li>
                <li>To communicate with you about your account and our Services.</li>
                <li>To personalize your experience and improve our Site and Services.</li>
                <li>To comply with legal obligations.</li>
            </ul>


            <h2>Security</h2>

            <p>We take reasonable measures to protect your personal information from unauthorized access, use, or
                disclosure. However, no method of transmission over the internet or electronic storage is 100% secure,
                and we cannot guarantee absolute security.</p>

            <h2>Changes to This Privacy Policy</h2>

            <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new
                Privacy Policy on this page.</p>

            <h2>Contact Us</h2>

            <p>If you have any questions about this Privacy Policy, please contact us at <a href="{{ route('tickets') }}">Support Tickets System</a>.</p>






        </div>
    </section>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>

@endsection