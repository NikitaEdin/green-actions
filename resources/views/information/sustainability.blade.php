@extends('layout.layout')
@section('title', 'Sustainability')

@section('content')


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        <style>
            .hero-section {
                background-image: url('{{ asset('images/windmill.jpg') }}');
                background-size: cover;
                background-position: center;
                /* background-attachment: fixed; */
                color: white;
                padding: 250px 0;
            }

            .section-padding {
                padding: 100px 0;
            }

            .quote-section {
                position: relative;
                background-image: linear-gradient(to top, #053618a8, #0f2b3291), url("{{ asset('images/forest.jpg') }}");
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
        </style>

    </head>

    <body>

        {{-- Hero --}}
        <section class="hero-section text-center">
            <div class="container">
                <h1 class="hero-reveal text-dark" style="font-size:50px;">Sustainability</h1>

                <p class="lead hero-reveal text-dark" style="font-size: 15; font-weight: 500;">Taking care of our planet for
                    future generations.</p>
            </div>
        </section>

        <!-- Sustainability Section -->
        <section id="sustainability" class="section-padding text-center" style="margin-bottom:4rem;">
            <div class="container">
                <h2 class="green-line">Understanding Sustainability</h2>
                <div class="text-start">

                    <p class="mt-3">Sustainability is not just a buzzword - it's a guiding principle for how we interact
                        with our planet.</p>

                    <p>It's about recognizing that we're all interconnected—humans, animals, plants, and ecosystems—and that
                        our actions have consequences that ripple through the environment. </p>

                    <p>When we talk about sustainability, we're talking about finding ways to meet our needs without
                        compromising the ability of future generations to meet theirs.</p>

                    <p class="mt-3">At its core, sustainability is about balance and using resources wisely, so they last
                        for generations to come.
                        <br> It's understanding that our actions can either harm or help the delicate balance of life on
                        Earth.
                    </p>
                </div>

            </div>
        </section>


        <!-- Quote Section -->
        <section class="text-center quote-section" style="padding: 100px;">
            <div class="container">
                <h2 class="text-light">
                    Small actions today lead to big changes tomorow.
                </h2>

                <h2 class="text-light lead">
                    Let's make sustainability a habit.
                </h2>
            </div>
        </section>


        <!-- Why it's important-->
        <section class="section-padding text-center">
            <div class="container">
                <h2 class="green-line">The Importance of Sustainability</h2>
                <p class="lead mt-3">
                <div class="row mt-5 justify-content-center">
                    <div class="col" style="text-align: left;">
                        <p>Sustainability is vital for the well-being of both people and the planet, <br>
                            as it ensures that future generation inherit a world that is just as rich and beautiful as the
                            one we enjoy today.</p>

                        <p class="mt-1">And that can be done by protecting our existing ecosystems, resources like clean
                            air, fresh water and fertile soil, <br>
                            which benifits humans and countless other species.</p>
                        <p style="margin-top:4rem;">Additionaly, sustainability promotes social equality and justice, by
                            creating communities where everyone thrive, for now and for the future.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('images/floating-windmill.png') }}" style="max-height:500px; margin-top:-100px;"
                            alt="image">
                    </div>
                </div>
                </p>
            </div>
        </section>


        <!-- The Challenges-->
        <section class="section-padding text-center" style=" background-color: #ecf1ef95;">
            <div class="container">
                <h2 class="green-line">The Challenges</h2>
                <p class="lead mt-3">

                <div class="row mt-5 justify-content-center">

                    <div class="col">
                        <img src="{{ asset('images/trash-bin.png') }}" style="max-height:300px; margin-top:-50px;"
                            alt="image">
                    </div>

                    <div class="col" style="text-align: left;">
                        <p>One of the biggest obstacles is overcoming short-term thinking and prioritising immediate gains over long-term benefits</p>
                        <p class="mt-1">In a world driven by constant growing consumption, convincing people to make sacrifices today for a better tomorrow can be a tough task.</p>
                        <p class="mt-5">Additionally, systemic barries like inadequate policies, lack of awareness, and ecnomic incentives that favour sustainable practices pose significant challenges.</p>
                    </div>
                </div>
                </p>
            </div>
        </section>


        <!-- Improvement -->
        <section class="section-padding text-center">
            <div class="container">
                <h2 class="green-line">How Do We Improve?</h2>
                <p class="lead mt-3">
                <div class="row mt-5 justify-content-center">
                    <div class="col">
                        <img src="{{ asset('images/floating-tree.png') }}" style="max-height:500px; margin-top:-50px;"
                            alt="image">
                    </div>

                    <div class="col" style="text-align: left;">
                        <p>Improving sustainability requires a collective effort from all sectors of society.</p>
                        <p class="mt-1">Individuals can play their part by embracing eco-friendly habits in their daily life routines,<br>
                            such as reducing waste, conserving energy, and supporting environmentally-safe products and technologies.</p>
                        <p style="margin-top:4rem;">Businesses are involved as well!<br>
                            They have the power to drive significant change through their operations, supply chains, and products.</p>
                        <p>Businesses can influence consumer behaviour by offering eco-friendly options, products, and services.</p>
                    </div>
                   
                </div>
                </p>
            </div>
        </section>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    </body>

    </html>

@endsection
