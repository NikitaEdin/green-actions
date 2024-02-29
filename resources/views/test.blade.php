<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://bootswatch.com/5/cosmo/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  @vite('resources/css/app.css')
  
  <style>
    #h1{
        size: 44px;
    }

    .section-padding{
        padding-top: 140px;
        padding-bottom: 140px;
    }

    .hero {
        background-image:url("{{ asset('images/hero-bg.png') }}")!important;
        background-repeat:no-repeat;
        background-size:cover;
        padding-top: 140px;
        padding-bottom: 100px;
    }

    .hero-accent{
        color: rgb(21, 250, 142);
        text-decoration: underline;
        font-weight: 900;
    }

   
  </style>

  
</head>
<body>
    {{-- Hero --}}
    <main>
        <section class="relative pt-[50px] lg:pt-[90px] pb-[50px] lg:pb-[100px] hero">
            <div class="max-w-screen-sm mx-auto px-4 flex items-center flex-col gap-12 lg:gap-10 lg:flex-row">
                <div class="flex flex-col items-center text-center flex-1 order-2 lg:order-1">
                    <h1 class="text-5xl lg:text-7x1 mb-5 text-white">
                        One
                        <span class="hero-accent">Green Action</span>
                        At a Time.
                    </h1>
                    <p class="text-gray-100 text-xl font-medium mb-10">
                        Accumulating Green Action for a greener future!<br>
                        
                    </p>

                    <div class="flex gap-4 text-white">
                        <button class="btn hover:bg-green-600 bg-green-500 text-sky-50 rounded-md">Read More</button>
                    </div>
                </div>
            </div>
        </section>
    </main>





    {{-- <img class="w-full h-full object-cover" src="{{ asset('images/slice1.png') }}" alt=""> --}}

   
    {{-- Features --}}
    <section class="bg-bookmark-white py-20 lg:mt-10">
        {{-- Heading --}}
        <div class="sm:w-3/4 lg:w-5/12 mx-auto px-2">
            <h1 class="text-3xl text-center text-bookmark-blue">What's a Green Action?</h1>
            <p class="text-center grey-300 mt-4">Each sustainability or Eco-friendly action taken by a company is referred as a Green Action,
                which are accumulated and converted to Green Points.</p>
        </div>
    </section>

    


    {{-- <div class="min-h-screen flex items-center justify-center hero">
        <div class="max-w-md mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Welcome to Our Site</h1>
            <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis libero quis risus pharetra, eget dapibus neque rutrum.</p>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Read More</a>
        </div>
    </div> --}}
</body>
</html>