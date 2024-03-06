<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{-- <title>
        @if (View::hasSection('title'))
          @yield('title') - GreenActions
        @else
          GreenActions
        @endif
      </title>
       --}}
      
   


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
         crossorigin="anonymous">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
        
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>

<body>
    @include('layout.nav')
 

    {{-- Page content goes here --}}
    @yield('content')


    @include('layout.footer')

</body>

</html>
