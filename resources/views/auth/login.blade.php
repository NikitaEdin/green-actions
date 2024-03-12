<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />

    {{--  Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>
<body>
    <div class="container-fluid p-3 bg-body-tertiary" style="position: absolute; top:0; left:0; width: 100%; z-index:1;">
        <a class="nav-link" style="color: var(--green-accent);" aria-current="page" href="{{ route('home') }}">
            <i class="fas fa-arrow-left me-1"></i>Home</a>
    </div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="border-2 rounded-3 p-3 bg-white shadow" style="max-width: 400px;"> 
            
            <div class="col-md right-box">
                <div class="row align-items-center justify-content-center">
                    <div class="header-text align-content-between mb-4">
                        <h2 class="text-center">Login</h2> 
                    </div>

                    {{-- Success messages --}}
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                     {{-- Auth related errors --}}
                     @error('auth')
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ $message }}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     @enderror

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        {{-- Username --}}
                        <div class="mb-3">
                            <input type="text" id="username" name="username" class="form-control"
                                class="form-controlbg-light fs-6" placeholder="Username">
                            @error('username')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        {{-- Password --}}
                        <div class="mb-3">
                            <input type="password" id="password" name="password" class="form-control bg-light fs-6"
                                placeholder="Password">
                            @error('password')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror


                            {{-- Forgot password? --}}
                            <div class="row justify-content-end m-0">
                                <div class="col-auto">
                                    <a  href="{{ route('forgot-password') }}">Forgot Password?</a>
                                </div>
                                
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label for="formCheck"><small>Remember Me</small></label>
                            </div>
                        </div>



                        <div class="row">
                            <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
                        </div>

                        <div class="input-group mb-3 mt-2">
                            <button  type="submit" name="register" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>

                    {{-- <div class="input-group ">
                        <a href="{{ route('home') }}" class="btn btn-lg btn-secondary w-100 fs-6">Home</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
