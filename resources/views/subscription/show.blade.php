@extends('layout.layout')

@section('content')
    <head>
        {{-- Custom CSS --}}
        <style>
            .progress-bar{
                background-color: var(--green-accent) !important;
            }
        </style>

    </head>

    <body style="background-color: whitesmoke;">
        <title>Subscription - GreenActions</title>

        {{-- Subscription logic --}}
        @livewire('subscription')
        
        <!-- Empty spacer -->   
        <div style="padding-top: 5rem;"></div>

        @livewireScripts
    </body>
    </html>
@endsection
