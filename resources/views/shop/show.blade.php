@extends('layout.layout')

@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop - GreenActions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        .disabled-card {
            position: relative;
            outline-color: transparent !important;
            opacity: 0.75;
        }

        .disabled-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 1rem;
            z-index: 1;
        }

        .card-body {
            position: relative;
            z-index: 2;
        }

        .coming-soon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: x-large;
            font-weight: 320;
            text-align: center;
            z-index: 3;
        }
    </style>

</head>

<body>

    <!-- Shop Section -->
    <section id="shop" class="mt-5 text-center" style="margin-bottom:4rem;">

        <h2 class="green-line">GreenAction Shop</h2>

        <div class="container mt-4">
            <div class="row d-flex justify-content-center">
                @foreach ($products as $product)
                    @livewire('shopcard', ['product' => $product])
                @endforeach
            </div>
        </div>


    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>

@endsection