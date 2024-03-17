@extends('layout.layout')

@section('content')


    <body style="background-color: whitesmoke;">
        <title>Payment - GreenActions</title>

        {{-- Payment logic --}}
        @livewire('CartPaymentComp' , ['cart' => $cart])
        
        <!-- Empty spacer -->   
        <div style="padding-top: 5rem;"></div>

        @livewireScripts
    </body>
    </html>
@endsection
