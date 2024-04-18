<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"crossorigin="anonymous" />

    {{--  Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>
<body>

  {{-- Navbar with single Back button --}}
    <div class="container-fluid p-3 bg-body-tertiary" style="position: absolute; top:0; left:0; width: 100%; z-index:1;">
        <a class="nav-link" style="color: var(--green-accent);" aria-current="page" href="{{ route('home') }}">
            <i class="fas fa-arrow-left me-1"></i>Home</a>
    </div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="border-2 rounded-3 p-3 bg-white shadow" style="max-width: 400px;"> 
            
            <div class="col-md right-box">
                <div class="row align-items-center justify-content-center">
                    <div class="header-text align-content-between mb-4">
                        <h2 class="text-center">Forgot Password</h2> 
                    </div>

                    {{-- Livewire component --}}
                    @livewire('forgot-password')
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
