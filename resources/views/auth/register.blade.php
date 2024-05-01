<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
        <div class="border-2 rounded-3 p-3 bg-white shadow" style="max-width: 400px;"> <!-- Added max-width style -->
            <div class="col-md right-box">
                <div class="row align-items-center justify-content-center"> <!-- Added justify-content-center -->
                    <div class="header-text align-content-between mb-4">
                        <h2 class="text-center">Register</h2> <!-- Added text-center class -->
                    </div>

                    @include('shared.success-message')
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        {{-- Username --}}
                        <div class="mb-3">
                            <input type="text" id="username" name="username" class="form-control"
                                class="form-controlbg-light fs-6" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Email --}}
                        <div class="mb-3">
                            <input type="email" id="email" name="email" 
                                class="form-control bg-light fs-6" placeholder="Email address" value="{{ old('email') }}">
                            @error('email')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <input type="password" id="password" name="password"  class="form-control bg-light fs-6" placeholder="Password">
                            @error('password')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <input type="password" name="password_confirmation" id="confirm-password" class="form-control bg-light fs-6"
                                placeholder="Confirm Password">
                            @error('password_confirmation')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mt-3 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" name="termsCheckbox" id="termsCheckbox" type="checkbox" value="">
                                <label class="form-check-label" for="termsCheckbox">
                                  <span>I accept the <a href="{{ route('terms') }}">Terms and Service</a> and <a href="{{ route('privacy') }}">Privacy Policy</a>.</span>
                                </label>
                                @error('termsCheckbox')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                              </div>
                        </div>


                        <div class="row">
                            <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
                        </div>

                        <div class="input-group mb-3 mt-5">
                            <button type="submit" name="register"
                                class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
