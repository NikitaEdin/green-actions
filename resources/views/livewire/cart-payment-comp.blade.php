<div>
    @if (Auth::user()->hasCard())
        @if ($paymentComplete)
            {{-- Transaction completed --}}
            <section id="paymentComplete">
                <div class="container mt-3 p-5" style="background-color: white;">
                    {{-- Header --}}
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="green-line">Thank you for your purchase!</h2>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row text-center" style="margin-top: 3rem;">
                    <p>£{{ $total }} was billed from your saved debit/credit card.</p>
                    </div>


                    <!-- Control -->
                    <div class="row mx-1 mt-3 text-center">
                        <div id="btn-flex" class="col d-flex justify-content-center">
                            <button onclick="window.location.href='{{ route('shop') }}'" class="btn btn-primary">Return to Shop</button>
                        </div>
                    </div>
                </div>
            </section>
        @else
            {{-- Confirm card and total amount --}}
            <section id="confirm-details">
                <div class="container mt-3 p-5" style="background-color: white;">
                    {{-- Header --}}
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="green-line">Payment Details</h2>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row " style="margin-top: 3rem;">
                        <!-- Main content - Confirmation (card and plan)-->
                        <div class="row mt-5 ">
                            <!-- Left side -->
                            <div class="col">
                                <p >Selected Card: </p>
                                <div class="container align-self-start col flex-col justify-content-evenly" >
                                    <div style="min-width: 190px; max-width: 350px; background-color: var(--green-accent); border-radius: 0.5rem; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.363)">
                                        <div class="row pt-2" style="color:white; min-height: 60px;">
                                            <div class="ms-3 mt-2" >
                                                <img src="{{ asset('images/nfc-symbol.png') }}" height="25" width="25" />
                                            </div>
                                        </div>
                
                                        <div class="row-lg-6 mx-0" style="min-height: 50px; display:inline;">
                                            <span class="ms-3" style="color: white;">••••</span>
                                            <span class="mx-3" style="color: white;">••••</span>
                                            <span class="me-3" style="color: white;">••••</span>
                                            <span style="color: white;">{{ Auth::user()->getCard()->getCardDisplay() }}</span>
                                        </div>
                                        
                
                                        <div class="row mx-0 mt-2" style=" background-color: #12B05D; border-radius: 0rem 0rem 0.5rem 0.5rem;">
                                            <span class="my-3 ms-2" style="font-size: 18px; color:white; font-weight: 600;">Exp <span style="font-weight: 500; font-size:14;">{{ Auth::user()->getCard()->card_date }}</span></span>
                                        </div>
                                    </div>
                                
                                </div>
                                
            
            
                                
                            </div>
            
                            <!-- Right side -->
                            <div class="col">
                                <!-- Pricing Card -->
                                <p>Summary: </p>
                                <div class="card border-2 rounded-2" style="border-color: var(--green-accent) !important;">
                                    <div class="card-body ">
            
                                        <!-- Plan title -->
                                        <div class="row text-start">
                                            <p class='fs-5'>Total: <span class="fs-4">£{{ $total }}</span></>
                                        </div>
                                        
                                        <button wire:click='confirmPayment' class="btn btn-primary mt-xl-4">Confirm Payment</button>


                                    </div>
                                </div>
                            </div>
                                
                        </div>      
                        

                    </div>


                    <!-- Controls -->
                    <div class="row mx-1 mt-5">
                        <div id="btn-flex" class="col d-flex justify-content-center">
                            <a href="{{ route('shop') }}" class="mx-2 btn btn-secondary">Return to Shop</a>
                            <a href="{{ route('cart') }}" class="mx-2 btn btn-secondary">Return to Cart</a>
                        </div>
                    </div>
                </div>
            </section>

        @endif
    @else
        
         {{-- No Card --}}
        <section id="no-card">
            <div class="container mt-3 p-5" style="background-color: white;">
                {{-- Header --}}
                <div class="row">
                    <div class="col text-center">
                        <h2 class="green-line">Payment Details</h2>
                    </div>
                </div>

                <!-- Main content -->
                <div class="row text-center" style="margin-top: 3rem;">
                <h5 style="font-weight: 600">Oh No!</h5>
                <p>Looks like you don't have any saved payment details.</p>
                <p>Navigate to your <a href="{{ route('settings') }}#payment-details">Account Settings</a> to add a new credit/debit card!</p>
                </div>


                <!-- Cart Control -->
                <div class="row mx-1 mt-3 text-center">
                    <div id="btn-flex" class="col d-flex justify-content-between">
                        <button onclick="window.location.href='{{ route('settings')}}#payment-details'" class="btn btn-primary">Go To Settings</button>
                        <a href="{{ route('shop') }}" class="btn btn-secondary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
