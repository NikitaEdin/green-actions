@extends('layout.layout')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tickets - GreenActions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom CSS for profile page --}}
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/common.css">
    </style>

</head>

<body style="background-color: whitesmoke;">



    <!-- Section: Tickets -->
    <section id="tickets">
        <div class="container p-3 mt-3 pb-5" style="background-color: white;">
            <div class="row">
                <!-- Upper section -->
                <div class="row">
                    <div class="col">
                        <h2 class="" style="display: inline;">Tickets</h2>
                        <hr class="mt-0" style="background-color:darkgray">

                        <h4 class="mt-2">Create new ticket</h4>
                        <form action="{{ route('newTicket') }}" method="POST">
                            @csrf

                            <!--  Title -->
                            <div class="row">
                                <div class="col mt-2 mb-3">
                                    <p class="mb-0">Title:</p>
                                    <input type="text" class="form-control" name="ticketTitle" aria-label="Ticket title"
                                        aria-describedby="ticket title" value="{{ old('ticketTitle') }}">
                                    @error('ticketTitle')
                                    <span class="d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="ticketContent" class="form-label">Content</label>
                                    <textarea name="ticketContent" style="max-height: 300px;" class="form-control"
                                        id="ticketContent" rows="3">{{ old('ticketContent') }}</textarea>
                                    @error('ticketContent')
                                    <span class="d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" name="createTicket" class="mt-3 btn btn-primary">Create
                                Ticket</button>
                        </form>
                        {{-- Success Message --}}
                        @if (session()->has('success'))
                        <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- My Tickets -->
                <div class="mt-5">
                    <h4>My Tickets</h4>
                    @livewire('tickets-list')
                </div>
            </div>
        </div>
    </section>

    <!-- Empty spacer -->
    <div style="padding-top: 20rem;"></div>




    @livewireScripts
</body>

</html>
@endsection