<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />

    {{--  Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>

<body>


    <div class="container-fluid p-3 bg-body-tertiary" style="position: absolute; top:0; left:0; width: 100%; z-index:1;">
        <a class="nav-link" style="color: var(--green-accent);" aria-current="page" href="{{ route('profile') }}">
            <i class="fas fa-arrow-left me-1"></i>Profile</a>
    </div>


    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="border-2 rounded-3 p-3 bg-white shadow" style="min-width: 300px;">

            <div class="col-md right-box">
                <div class="row align-items-center justify-content-center">
                    <div class="header-text align-content-between mb-4">
                        <h2 class="text-center">Update Details</h2>
                    </div>

                    {{-- Success messages --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Auth related errors --}}
                    @error('auth')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    <form action="{{ route('updateDetails') }}" method="POST">
                        @csrf

                        {{-- Display name --}}
                        <div class="form-group mb-3">
                            <label for="displayname">Display name <span class="text-muted">(visible to others)</span></label>
                            <input type="text" class="form-control" id="displayname" name="displayname"
                                placeholder="Enter your display name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : ''}}">
                                @error('displayname')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Contact Person name --}}
                        <div class="form-group mb-3">
                            <label for="contact">Contact person</label>
                            <input type="text" class="form-control" id="contact" name="contact"
                                placeholder="Enter your contact person's name" value="{{ isset(Auth::user()->contact) ? Auth::user()->contact : ''}}">
                            @error('contact')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Telephone number --}}
                        <div class="form-group mb-3">
                            <label for="number">Telephone number</label>
                            <input type="tel" class="form-control" id="number" name="number"
                                placeholder="Enter your telephone number" value="{{ isset(Auth::user()->number) ? Auth::user()->number : ''}}">
                            @error('number')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Bio --}}
                        <div class="form-group mb-3">
                            <label for="bio">Bio <span class="text-muted">(visible to others)</span></label>
                            <textarea class="form-control" id="bio" rows="3" name="bio" style="max-height: 300px"
                                placeholder="Write something about yourself">{{ isset(Auth::user()->bio) ? Auth::user()->bio : ''}}</textarea>
                            @error('bio')
                                <span class="d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="input-group mb-3 mt-5">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Update Details</button>
                        </div>
                    </form>
                  
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
