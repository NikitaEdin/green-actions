        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- FontAwesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            crossorigin="anonymous" />

        <style>
            /* Navbar  */
            .sticky-top {
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000;
            }


            .navbar-scrolled {
                transition: all 0.5s;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
            }

            .active {
                color: var(--green-accent) !important;
                font-weight: 600 !important;
            }

            /* Profile dropdown */
            .profile-pic {
                display: inline-block;
                vertical-align: middle;
                overflow: hidden;
                border-radius: 50%;
            }

            .profile-pic img {
                width: 100%;
                height: auto;
                object-fit: cover;
            }

            .profile-menu .dropdown-menu {
                right: 0;
                left: unset;
            }
            
            .profile-menu .fa-fw {
                margin-right: 20px;
            }

            .toggle-change::after {
                border-top: 0;
                border-bottom: 0.3em solid;
            }
        </style>


        <body>

            <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"
                        style="font-weight: 600; color: var(--green-accent);">GreenActions</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            {{-- Home --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            {{-- Sustainability --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('sustainability') ? 'active' : '' }}" href="{{ route('sustainability') }}">Sustainability</a>
                            </li>
                            {{-- Our Mission --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">Our Mission</a>
                            </li> --}}
                            {{-- Competition info --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Competition
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">About Competition</a></li>
                                    <li><a class="dropdown-item" href="#">Leaderboards</a></li>
                                </ul>
                            </li>

                        </ul>

                        {{--  Guest: show register and login buttons --}}
                        @guest
                            <div class="d-flex navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            </div>
                        @endguest

                        {{-- Auth: show logout for logged in users --}}
                        {{-- @auth
                            <div class="d-flex navbar-nav">
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link"
                                            style="background: none; border: none; cursor: pointer;">Logout</button>
                                    </form>
                                </li>
                            </div>
                        @endauth --}}

                        @auth
                            
                        
                        {{-- Profile dropdown --}}
                        <ul class="navbar-nav profile-menu me-3">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mx-2">{{ Auth()->User()->displayNameFull() }}</span>
                                    <div class="profile-pic">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                </a>
                               
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-solid fa-user fa-fw"></i>
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('settings') }}"><i class="fas fa-cog fa-fw"></i>
                                            Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('sub') }}">
                                        <img class="fa-fw" src="{{ asset('images/subscription.png') }}" />
                                        Manage Subscription</a></li>
                                    <li>
                                    <li><a class="dropdown-item" href="{{ route('tickets') }}"><i class="fas fa-envelope fa-fw"></i>
                                        Support Tickets</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    


                                    <li>    

                                    {{-- Logout --}}
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                            style="background: none; border: none; cursor: pointer;">Logout</button>
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endauth

                    </div>
                </div>
            </nav>


            <script>
                // Navbar follows as scrolling down
                const nav = document.querySelector('.navbar');
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 56) {
                        nav.classList.add('navbar-scrolled');
                    } else {
                        nav.classList.remove('navbar-scrolled');
                    }
                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        </body>
