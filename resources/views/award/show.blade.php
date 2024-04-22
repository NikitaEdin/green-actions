@extends('layout.layout')
{{-- @section('title', 'Profile') --}}

@section('content')


    <title>Award</title>

    <body style="background-color: whitesmoke;">
        {{-- Success messages --}}
        @if (session()->has('success'))
            <div class="container mt-2">
                <div class="row">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

         <!-- Section: Award -->
        <section id="award">
        <div class="container p-3">
            <div class="d-flex justify-content-center" 
            style="background:white; border: 5px solid {{ Auth::user()->getAwardColour() }}; border-radius: 0.5rem 0.55rem 0.5rem 0.5rem;">
                <div class="container mt-3">
                    <div class="row">
                        <div class="d-flex-column">
                            <!-- Title -->
                            <div class="d-flex justify-content-center">
                                <h1>Congratulations!</h1>
                            </div>
                            <!-- Award image -->
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('images/awards/' . Auth::user()->getAwardImage()) }}" style="width: 90px;" alt="">
                            </div>
                            <!--  Award type -->
                            <div class="pt-2 d-flex justify-content-center">
                                <h5 class="lead">{{ Auth::user()->getAwardTitle() }}</h5>
                            </div>

                            <div class="pt-3 d-flex justify-content-center">
                                <h5>Awarded to</h5>
                            </div>

                            <!-- Name -->
                            <div class="d-flex justify-content-center">
                                <p>{{ Auth::user()->displayNameFull() }}</p>
                            </div>


                            <div class="pt-3 d-flex justify-content-center">
                                <h5>For Accumulating</h5>
                            </div>
                            <div class="pb-5 d-flex justify-content-center">
                                <h6 style="font-weight: 400;">{{ Auth::user()->getGreenPoints() -  Auth::user()->getUserPointSum()}} Green points</h6>
                            </div>
                    </div>
                </div>  
            </div>
        </div>
        </section>

        <!-- Empty spacer -->
        <div style="padding-top: 20rem;"></div>

        @livewireScripts
    </body>
@endsection
