@extends('layout.layout')
{{-- @section('title', 'Sustainability') --}}

@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sustainability - greenPoints</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <section id="shop" class="mt-5 text-center" style="margin-bottom:4rem;">

        <h2 class="green-line">Cart</h2>

        <div class="container mt-4">
            <!-- Cart Items -->
            <form action="{{ route('submit-cart') }}" method="POST">
                @csrf
           
            <div class="row d-flex flex-column justify-content-start text-start">
                <div class="col">
                    <p id="header-selectedItems" class="lead pb-5">Selected Item(s)</p>



                    <!-- Item Green Points-->
                    @if (isset($item_greenPoints))
                    <div id="greenPoints" class="rootItem">
                        <div class="row d-flex justify-content-between m-1">
                            <span class="col-auto">{{ $item_greenPoints['quantity'] }} {{ $item_greenPoints['name']
                                }}</span>
                            <span class="col-auto d-flex align-items-center">
                                <span id="greenActionValue" class="mx-2">£{{ $item_greenPoints['price'] *
                                    $item_greenPoints['quantity'] }}</span>
                                @livewire('CartItemRemove', ['product' => $item_greenPoints])
                            </span>
                        </div>
                        <hr class="mt-0" style="background-color:darkgray">
                    </div>
                    @endif

                    <!-- Item Green Points-->
                    @if (isset($item_donation))
                    <div id="donation" class="rootItem" name='donation'>
                        <div class="row d-flex justify-content-between m-1">
                            <div class="col">
                                <span>Donation</span>
                            </div>


                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <span class="px-2">Quantity: </span>
                                    <input name="donationValue" id="donationValue" style="max-width: 10rem" type="number"
                                        class="form-control" placeholder="Quantity" value="{{ $item_donation['quantity'] }}" min="1">
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <span class="px-2">£{{ $item_donation['price'] }}</span>

                                    @livewire('CartItemRemove', ['product' => $item_donation])
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0" style="background-color:darkgray">
                    </div>
                    @endif


                </div>
            </div>

            <!-- Empty Cart message -->
            <div id="emptyCart" class="row text-center" style="display: none;">
                <div class="col justify-content-md-center">
                    <p>No items were added to cart.</p>
                </div>
            </div>

            <!-- Total -->
            <div class="row mt-5 mx-1">
                <div class="col d-flex justify-content-end">
                    <span id="totalPrefix" class="me-1" style="font-size: large; font-weight: 200;">Total: £</span>
                    <span id="total" class="text-end" style="font-size: large; font-weight: 500;">0</span>
                </div>
            </div>


            <!-- Cart Control -->
            <div class="row mx-1 mt-3 text-center">
                <div id="btn-flex" class="col d-flex justify-content-between">
                    <a href="{{ route('shop') }}" class="btn btn-secondary">Return to Shop</a>
                    <button id="btn-confirm" class="btn btn-primary">Confirm Cart</button>
                </div>
            </div>

        </form>

        </div>


    </section>




    <script>
        function checkEmptyCart(){
            const rootItems = document.querySelectorAll('.rootItem');
            const emptyCartDiv = document.getElementById('emptyCart');
            const headerDiv = document.getElementById('header-selectedItems');
            const totalSpan = document.getElementById('total');
            const totalPrefix = document.getElementById('totalPrefix');
            const confirmButton = document.getElementById('btn-confirm');
            const buttonFlex = document.getElementById('btn-flex');

            if(rootItems.length === 0){
                emptyCartDiv.style.display = 'block';
                headerDiv.style.display = 'none';
                totalSpan.style.display = 'none';
                totalPrefix.style.display = 'none';
                confirmButton.style.display = 'none';
              
                buttonFlex.classList.remove('justify-content-between');
                buttonFlex.classList.add('justify-content-center');
            }else{
                emptyCartDiv.style.display = 'none';
                headerDiv.style.display = 'block';
                totalSpan.style.display = 'block';
                totalPrefix.style.display = 'block';
                confirmButton.style.display = 'block';

                buttonFlex.classList.remove('justify-content-center');
                buttonFlex.classList.add('justify-content-between');
            }
        }


    </script>

    <script>
        // update total price, once an input is changed or removed
        function updateTotal(){
            // Get greenpoints ref (if any)
            const greenPointsSpan = document.getElementById('greenActionValue');
            let greenPointsPrice = 0;
            if(greenPointsSpan){
                // Get price
                greenPointsPrice = parseFloat(greenPointsSpan.textContent.replace('£', ''));
            }

            // Get donation ref (if any)
            const donationInput = document.getElementById('donationValue');
            let donationQuanity = 0;
            if(donationInput){
                // Clamp input value
                if(donationInput.value < 1){
                    donationInput.value = 1;
                }else if(donationInput.value > 100){
                    donationInput.value = 100;
                }
                donationQuanity = donationInput.value;
            }

            // Combine prices
            const donationTotal = donationQuanity * 10;
            const totalPrice = greenPointsPrice + donationTotal;

            // Update total price
            const totalSpan = document.getElementById('total');
            totalSpan.textContent = totalPrice.toFixed(2);
        } 

        // init 
        updateTotal();
        checkEmptyCart();

       // Listen to changes and update total price
       document.getElementById('donationValue').addEventListener('change', updateTotal);
    </script>



    <script>
        // Remove item
        function removeItem(){
            let itemContainer = event.target;
            event.target.classList.add('disabled');

            while (itemContainer && !itemContainer.classList.contains('rootItem')) {
                itemContainer = itemContainer.parentNode;
            }

            

            // If rootItem is found, remove it
            if (itemContainer) {
                setTimeout(function() {
                itemContainer.remove();
                updateTotal();
                checkEmptyCart();
                }, 500);
            }
        }

        // Get all buttons
        const closeButtons = document.querySelectorAll('#removeItem');

        // Listen to clicks
        closeButtons.forEach(button => {
            button.addEventListener('click', removeItem);
        });
    </script>





    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>

@endsection