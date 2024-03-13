@extends('layout.layout')
{{-- @section('title', 'Sustainability') --}}

@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terms and Conditions - GreenActions</title>
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
            <h1 class="text-dark mb-3 text-center" style="font-size:50px;">Terms and Conditions</h1>



            <p>These Terms and Conditions ("Agreement") govern your use of the GreenActions website ("Site") and its
                services ("Services"). By accessing or using the Site and Services, you agree to be bound by this
                Agreement. If you do not agree with any part of this Agreement, do not access or use the Site or
                Services.</p>

            <ol>
                <li><strong>Registration and Account:</strong> You may be required to register for an account to access
                    certain features of the Site and Services. When registering, you agree to provide accurate and
                    complete information. You are responsible for maintaining the confidentiality of your account
                    credentials and for all activities that occur under your account.</li>

                <li><strong>Data Collection and Privacy:</strong> By using the Site and Services, you consent to the
                    collection, use, and disclosure of your personal information as described in our <a href="">Privacy Policy</a>.
                    This may include but is not limited to your username, email, password, phone number, contact
                    details, and credit card details.</li>

                <li><strong>User Content:</strong> You are solely responsible for any content you post, upload, or
                    transmit through the Site and Services ("User Content"). You retain ownership of your User Content
                    but grant GreenActions a worldwide, royalty-free, non-exclusive license to use, reproduce, modify,
                    adapt, publish, translate, distribute, and display your User Content in connection with the Site and
                    Services.</li>

                <li><strong>Prohibited Activities:</strong> You agree not to engage in any of the following prohibited
                    activities:
                    <ul>
                        <li>Violating any applicable laws or regulations.</li>
                        <li>Impersonating any person or entity or falsely stating or misrepresenting your affiliation
                            with a person or entity.</li>
                        <li>Uploading, posting, or transmitting any content that is unlawful, harmful, threatening,
                            abusive, harassing, defamatory, vulgar, obscene, or otherwise objectionable.</li>
                        <li>Attempting to interfere with, compromise the security of, or disrupt the Site or Services.
                        </li>
                    </ul>
                </li>

                <li><strong>Payment and Transactions:</strong> If you make any purchases through the Site, you agree to
                    provide accurate payment information and authorise GreenActions to charge your credit card or other
                    payment methods for any purchases made.</li>

                <li><strong>Intellectual Property:</strong> All content on the Site and Services, including but not
                    limited to text, graphics, logos, images, and software, is the property of GreenActions or its
                    licensors and is protected by copyright, trademark, and other intellectual property laws.</li>

                <li><strong>Termination:</strong> GreenActions reserves the right to suspend or terminate your access to
                    the Site and Services at any time, without prior notice or liability, for any reason whatsoever,
                    including without limitation if you breach this Agreement.</li>

                <li><strong>Disclaimer of Warranties:</strong> The Site and Services are provided on an "as is" and "as
                    available" basis, without warranties of any kind, either express or implied. GreenActions disclaims
                    all warranties, including but not limited to implied warranties of merchantability, fitness for a
                    particular purpose, and non-infringement.</li>

                <li><strong>Limitation of Liability:</strong> In no event shall GreenActions, its officers, directors,
                    employees, or agents be liable for any indirect, incidental, special, consequential, or punitive
                    damages, including without limitation lost profits, data, use, or other intangible losses, arising
                    out of or in connection with your use of the Site and Services.</li>

                <li><strong>Governing Law and Jurisdiction:</strong> This Agreement shall be governed by and construed
                    in accordance with the laws of the United Kingdom. Any dispute arising out of or relating to this
                    Agreement shall be exclusively resolved by the courts of the United Kingdom.</li>

                <li><strong>Minimum Age Requirement:</strong> By using the Site and Services, you confirm that you are
                    at least 18 years old. If you are under 18, you may not create an account or use the Site and
                    Services.</li>

                <li><strong>Competition:</strong> GreenActions may organise competitions on the website. Participation
                    in these competitions is voluntary and subject to additional terms and conditions specified for each
                    competition. Participants must provide accurate information as requested for the competition.
                    GreenActions ensures that all competitions are run genuinely and trustworthily for the benefit of
                    users.</li>

                <li><strong>Changes to Agreement:</strong> GreenActions reserves the right to modify this Agreement at
                    any time. Any changes will be effective immediately upon posting on the Site. Your continued use of
                    the Site and Services after any such changes constitutes your acceptance of the modified Agreement.
                </li>
            </ol>

            <p>By accessing or using the Site and Services, you agree to be bound by this Agreement. If you do not agree
                with any part of this Agreement, do not access or use the Site or Services. If you have any questions
                about this Agreement, please contact us at <a href="{{ route('tickets') }}">Support Tickets</a>.</p>

        </div>
    </section>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>

@endsection