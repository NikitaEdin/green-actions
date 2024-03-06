@extends('layout.layout')
<title>Account Settings - GreenActions</title>

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>Settings</title> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- Custom CSS for profile page --}}
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body style="background-color: whitesmoke;">

        @livewire('account-settings', ['user' => Auth::user()])

        <!-- Empty spacer -->
        <div style="padding-top: 10rem;"></div>

        @livewireScripts
    </body>
    </html>
@endsection
