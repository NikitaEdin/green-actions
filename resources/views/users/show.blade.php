@extends('layout.layout')
{{-- @section('title', 'Profile') --}}

@section('content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- Custom CSS for profile page --}}
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

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

        {{-- Error message --}}
        @if (session()->has('error'))
            <div class="container mt-2">
                <div class="row">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif


        @if (Auth::user()->isDeactivated())
            <div class="container mt-5 p-5 d-flex justify-content-center align-items-center"
            style="background:white; border-radius: 1rem; outline: 1.5px solid rgba(255, 0, 0, 1); background-color: rgba(255, 0, 0, 0.05);">
                <div class="text-center">
                    <h5>Oh no!</h5>
                    <p>Your account has been deactivated by an administrator.</p>
                </div>
            </div>
        @else
      

        <!-- Section: Profile -->
        <section id="profile">
            <div class="container mt-3 pb-5" style="background-color: white;">
                <div class="row">
                    <!-- Upper section (user title and edit button) -->
                    <div class="d-flex">
                        <!-- User header -->
                        <div class="p-2 flex-grow-1">
                            <div class="d-flex align-items-center">
                                <h2 class="me-3" style="display: inline;">{{ $user->displayName() }}</h2>

                                {{-- GreenStatus Badge --}}
                                @if ($user->hasGreenStatus())
                                    <img class="me-1" src="{{ asset('images/badges/badge-leaf.png') }}" height="25"
                                    alt="Badge" class="badge-image">
                                @endif

                                {{-- Admin Badge --}}
                                @if ($user->isAdmin())
                                    <span class="badge rounded-pill text-bg-danger ms-1">Admin</span>
                                @endif

                                {{-- Compeition Ranking --}}
                                @if ($compPos === 1)
                                    <span class="px-3 py-2 badge rounded-pill text-bg-dark ms-1"
                                        style="background-color: rgb(254, 191, 2) !important;">#1</span>
                                @elseif($compPos === 2)
                                    <span class="px-3 py-2 badge rounded-pill text-bg-dark ms-1"
                                    style="background-color: rgb(158, 152, 143) !important;">#2</span>

                                @elseif($compPos === 3)
                                    <span class="px-3 py-2 badge rounded-pill text-bg-dark ms-1"
                                    style="background-color: rgb(206, 95, 5) !important;">#3</span>

                                @endif

                            </div>
                        </div>
                        <!-- Edit button -->
                        <div class="p-2">
                            <div class="d-flex justify-content-start">
                                @if (Auth::user()->hasAward())
                                    {{-- Award --}}
                                    <a href="{{ route('award') }}" class="btn btn-outline-success me-3">
                                    <p style="display: inline; margin: 0;"> View Award</p>
                                    <i class="fa-solid fa-medal"></i>
                                </a> 
                                @endif

                                {{-- Public self profile --}}
                                <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-success me-3">
                                    <p style="display: inline; margin: 0;"> Public Profile</p>
                                    <i class="fa-solid fa-user"></i>
                                </a>

                                {{-- Edit profile details --}}
                                <a href="{{ route('updateDetails') }}" class="btn btn-outline-success">
                                    <p style="display: inline; margin: 0;">Edit</p>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>

                        </div>
                    </div>


                    <!-- Left, profile and bio -->
                    <div class="col-md-5">
                        <div class="px-2">
                            <h5 class="fs-5" style="font-weight: 400;">About</h5>
                            {{-- Email --}}
                            @if (isset(Auth::user()->email))
                                <p class="mb-0">Email: {{ $user->email }}</p>
                            @endif
                            {{-- Contact person --}}
                            @if (isset(Auth::user()->contact))
                                <p class="mb-0">Contact Person: {{ $user->contact }}</p>
                            @endif

                            {{-- Telephone number --}}
                            @if (isset(Auth::user()->number))
                            <p class="mb-0">Contact number: {{ $user->number }}</p>
                            @endif

                            {{-- Bio --}}
                            @if (isset(Auth::user()->bio))
                            <p class="mt-2">Bio: <br>{{ $user->bio }}</p>
                            @endif
                        </div>

                    </div>

                    <!-- Progress -->
                    <div class="col-lg-3">
                        <div>
                            <h5 class="fs-5" style="font-weight: 400;">Green Progress</h5>
                            <p id="greenpoints" class="mb-0"> Green Points: {{ $user->getGreenPoints() }}
                                @if ($user->getUserPointSum() > 0)
                                    <span class="ms-1" style="color: var(--green-accent-press); font-weight: 600">(+{{ intval($user->getUserPointSum()) }})</span>
                                @endif
                            
                            </p>
                            <p id="greenstatusLabel">Green Status: {{ $user->hasGreenStatus() ? 'Granted' : 'None' }}</p>
                        </div>


                    </div>
                    <!-- Badges -->
                    <div class="col-lg-4">
                        @livewire('profile-badges', ['user' => $user])
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Green Action  -->
        <section id="greenactions">
            <div class="container mt-5">
                <h4>Green Actions</h4>
                <hr style="width: 100%; border-top: 1px solid; color:text-muted;">

                <!-- New action -->
                <div class="mt-3">

                    <!-- <div class="container text-center">
                        <p>No Actions to add.</p>
                    </div> -->


                    {{-- Add new Action --}}
                    @if ($user->hasValidSubscription() || $user->isAdmin())
                        @livewire('add-green-action', ['greenActions' => $greenActions])
                    @else
                    <div class="row py-2" style="background-color: white; border-radius: 0.5rem;">
                        <div class="col text-center">
                            <p>GreenActions are not available for Free Tier Account.</p>
                            <p><a href="{{ route('sub') }}">Upgrade your account</a> to unlock this feature.</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>


        <!-- Previous/History GreenAction -->
        @if ($user->hasValidSubscription() || $user->isAdmin())
            <section id="action-history">
                <div id="actions-list" class="container" style="margin-top: 5rem;">
                    <div class="row">
                        <div class="col">
                            <h4>Your Green Actions</h4>
                        </div>
                        <div class="col text-end" >
                              <a href="{{ route('history') }}" class="btn btn-outline-success me-3">
                                    <p style="display: inline; margin: 0;"> View History</p></a>
                        </div>
                    </div>
                    
                    <hr>

                    {{-- Livewire: view and manage existing green actions --}}
                    @livewire('user-action-component', ['userActions' => $user->getUserActions, 'user'=> $user])

                </div>
            </section>

        @endif

        <!-- Empty spacer -->
        <div style="padding-top: 20rem;"></div>


        @endif



        <!--  Contribution level script-->
        <script>
            const buttons = document.querySelectorAll('.con-level');

            // Ensure only one is active
            function handleClick(event) {
                const isActive = this.classList.contains(this.name + '-active')
                buttons.forEach(button => {
                    button.classList.remove(button.name + '-active');
                });

                // Skip if already active
                if (!isActive) {
                    this.classList.add(this.name + '-active');
                }
            }

            buttons.forEach(button => {
                button.addEventListener('click', handleClick);
            });
        </script>


        {{-- Listener: on when action was created/modified  --}}
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('update-point', (event) => {
                    // Update green points
                    var greenPointsParagraph = document.getElementById('greenpoints');
                    if (greenPointsParagraph) {
                        greenPointsParagraph.textContent = 'Green Points: ' + event.points;
                    }
                    // Update green status
                    var greenStatusParagraph = document.getElementById('greenstatusLabel');
                    if (greenStatusParagraph) {
                         greenStatusParagraph.textContent = 'Green Status: ' + (event.points >= 100 ? 'Granted' : 'None');
                    }
                });
            });
        </script>

        <script>
            // Get all closing buttons within the green actions
            const deleteButtons = document.querySelectorAll('button[name="remove-action"]');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove closest container
                    const container = this.closest('.container');
                    container.remove();

                    // Check if last action was removed
                    const remainingActions = document.getElementById('actions-list').children.length;
                    if (remainingActions === 2) {
                        // Add error paragraph
                        const noActionsParagraph = document.createElement('p');
                        noActionsParagraph.textContent = 'No actions found.';
                        document.getElementById('actions-list').appendChild(noActionsParagraph);
                    }
                });
            });
        </script>
        @livewireScripts
    </body>
    </html>
@endsection
