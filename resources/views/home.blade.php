@extends('layout.layout')
{{-- @section('title', 'Home') --}}

@section('content')
    <style>
        /* hero section*/
        .hero-section {
            background-image: url("{{ asset('images/hero-bg.png') }}");
            background-size: cover;
            background-position: center;
            /* background-attachment: fixed; cool effect*/ 
            color: white;
            padding: 250px 0;
        }

        .hero-section h1 {
            scale: 1.3;
        }

        .section-padding {
            padding: 100px 0;
        }

        /* fontawesome in rounded sqaure */
        .feature {
            align-items: center;
            padding: 15px;
            justify-content: center;
            background-color: var(--green-accent);
            ;
            border-radius: 20%;
            color: white;
            scale: 1.1;
        }

        /* quote section with a bg */
        .quote-section {
            background-image: url("{{ asset('images/divider-bg1.png') }}");
            background-size: cover; 
            background-position: center;
            
            color: white;
            padding: 100px 0;
        }

        @media screen and (max-width: 700px) {
        .hero-reveal {
            font-size: 24px; 
        }
    }
    </style>

    {{--  Script to smoothly reveal items --}}
    <script src="https://unpkg.com/scrollreveal"></script>

    <body>
        <title>Home - GreenActions</title>
        <!-- Hero Section -->
        <section class="hero-section text-center">
            <div class="container">
                <h1 class="hero-reveal">One
                    <span style="color: rgb(22, 232, 99); text-decoration: underline;">Green Action</span>
                    At a time.
                </h1>
                <p class="lead hero-reveal">Embark on a journey of sustainability with our community, where every small action
                    contributes to a brighter, greener tomorrow.</p>
                <a href="#greenAction" class="btn btn-primary btn-lg mt-5 hero-button">Read More!</a>

            </div>
        </section>

        <!-- GreenAction Section -->
        <section id="greenAction" class="mt-5 py-5 text-center ">
            <div class="container">
                <h2 class="green-line">What's a Green Action?</h2>
                <p class="mb-5">Each sustainability or Eco-friendly action taken by a company is referred as a Green
                    Action,<br>
                    which are accumated on their profile, and covered to Green Points.</p>
                <div class="row mt-5 py-5">
                    <div class="col-md-4">
                        <i class="feature fas fa-layer-group"></i>
                        <h4>Collect Green Actions</h4>
                        <p>Create and keep track of your sustainability actions.</p>
                    </div>

                    <div class="col-md-4">
                        <i class="feature fas fa-share-square"></i>
                        <h4>Covert Actions to Points</h4>
                        <p>Collect 100 points to reach the GreenStatus.</p>
                    </div>

                    <div class="col-md-4">
                        <i class="feature fas fa-award"></i>
                        <h4>Receive GreenStatus</h4>
                        <p>Get your company awarded with the GreenStatus.</p>
                    </div>



                </div>
            </div>
        </section>

        <!-- Quote Section -->
        <section class="quote-section py-10 text-center">
            <div class="container">
                <h2 style="font-style: italic; font-weight: 500; font-size: larger;">Sustainability is not just about saying
                    the environment;<br>
                    it's about creating a world where people and nature can thrive together in harmony.
                </h2>
            </div>
        </section>

        <!-- Sustainability Section -->
        <section id="sustainability" class="section-padding text-center">
            <div class="container">
                <h2 class="green-line">Sustainability?</h2>
                <p class="lead mt-3">Sustainability matters because it fuels a friendly competition among companies, driving
                    them to showcase their green actions
                    and earn points toward achieving a coveted "Green Status." </p>
                <p class="lead"> This competitive spirit not only motivates companies to adopt sustainable practices but
                    also fosters collaboration and innovation within the industry.
                    By striving for higher green status, companies collectively drive positive change, demonstrating the
                    power of collective action in creating a more
                    sustainable world.</p>
                <a href="{{ route('sustainability') }}" class="btn btn-primary btn-lg mt-5">Read More!</a>
            </div>
        </section>

        <!-- Competition Section -->
        <section class="section-padding text-center">
            <div class="container">
                <h2 class="green-line">Friendly Competition</h2>
                <p class="lead mt-3">
                <div class="row mt-5">
                    <div class="col">
                        <p style="text-align: left;">The competition drives companies to pioneer green solutions, earning
                            valuable points on the path to achieving the prestigious 'Green Status'!</p>

                        <p class="mt-1" style="text-align: left;">The competition not only sparks innovation but also boosts
                            awareness and motivation, driving companies to lead the way in sustainability through their pioneering green solutions!</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('images/landing-competition.png') }}" alt="image">
                        <img src="" alt="">
                    </div>
                </div>
                </p>
            </div>
        </section>

        <!-- Pricing -->
        <section class="section-padding text-center">
            <h2 class="green-line">Pricing</h2>
            <p>Gain access to valuable resources and networking<br>opportunities while competing for a the prestigious
                'Green Status'!</p>


            <div class="container text-center mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <div class="card border-2 rounded-5"
                            style="width: 25rem;  border-color: var(--green-accent) !important;">
                            <div class="card-body">

                                <!-- Top right check mark -->
                                <div class="row">
                                    <div class="container text-end">
                                        <i class="feature fas fa-check rounded-5" style="scale: 0.8;"></i>
                                    </div>
                                </div>

                                <!-- Plan title -->
                                <div class="row text-start">
                                    <h5>Basic Plan</h5>
                                </div>

                                <!-- Price -->
                                <div class="row text-start mt-2">
                                    <div>
                                        <span class="h2" style="font-weight: 600;">£99/</span><span
                                            class="h5">yr</span>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <div class="mt-4 mx-1" style="border-top: 2px solid var(--green-accent);"></div>

                                <p class="mt-2 mb-3 text-start ">Includes:</p>
                                <div class="row text-start mt-2 ms-0.5">
                                    <!-- Features -->
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                        <p class="ms-3 mb-0">Accumulate Green Actions</p>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                        <p class="ms-3 mb-0">Join the competition with others</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                        <p class="ms-3 mb-0">Ability to reach the GreenStatus</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                        <p class="ms-3 mb-0">Badges and rankings</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                        <p class="ms-3 mb-0">Live support 24/7</p>
                                    </div>

                                    <!-- Button -->
                                    <div class="container text-center mt-5">
                                        <div onclick="window.location='{{ route('sub') }}';" class="btn btn-primary d-md-block p-2 mx-5">GET STARTED</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

     


        {{-- ScrollReveal --}}
        <script>
            // Hero text
            ScrollReveal().reveal('.hero-reveal', {
                delay: 0, 
                distance: '30px', 
                origin: 'bottom', 
                duration: 700, 
                easing: 'ease-in-out', 
                reset: true 
            });

            // hero button
            ScrollReveal().reveal('.hero-button', {
                delay: 100, 
                distance: '30px', 
                origin: 'bottom', 
                duration: 1000, 
                easing: 'ease-in-out', 
                reset: true 
            });

            // other sections
            ScrollReveal().reveal('.section-padding', {
                delay: 100, 
                distance: '50px', 
                origin: 'bottom', 
                duration: 750, 
                easing: 'ease-in-out', 
                reset: false 
            });
        </script>

    </body>
@endsection
