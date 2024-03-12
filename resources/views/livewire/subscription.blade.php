<div>


    {{-- State: Brief --}}
    @if ($currentState === 'brief')

        <section id="brief">
            <div class="container mt-3 p-5" style="background-color: white;">
                {{-- Header --}}
                <div class="row">
                    <div class="col text-center">
                        <h4>Manage Subscription</h4>
                    </div>
                </div>


                <!-- Main content -->
                <div class="row" style="margin-top: 3rem;">
                    <div class="col flex-col mt-3">
                        <p class="fs-4 lead">To activate your account, subscribe to the
                            annual subscription plan!</p>
                        <p class="mt-5 fs-4 lead">And unlock the full potencial of your account.</p>
                    </div>

                    <!-- Pricing on the right -->
                    <div class="col">
                        <div class="container text-center">
                            <div class="row justify-content-md-center">
                                <div class="col">
                                    <div class="card border-2 rounded-5"
                                        style="width: 25rem;  border-color: var(--green-accent) !important;">
                                        <div class="card-body">

                                            <!-- Plan title -->
                                            <div class="row text-start">
                                                <h5>Basic Plan</h5>
                                            </div>

                                            <!-- Price -->
                                            <div class="row text-start mt-2">
                                                <div>
                                                    <span class="h2" style="font-weight: 600;">£99/</span><span
                                                        class="h5">yr</span>
                                                </div>
                                            </div>

                                            <!-- Divider -->
                                            <div class="mt-4 mx-1" style="border-top: 2px solid var(--green-accent);"></div>

                                            <p class="mt-2 mb-3 text-start ">Includes:</p>
                                            <div class="row text-start mt-2 ms-0.5">
                                                <!-- Features -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                                    <p class="ms-3 mb-0">Accumulate Green Actions</p>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                                    <p class="ms-3 mb-0">Join the competition with others</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                                    <p class="ms-3 mb-0">Ability to reach the GreenStatus</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                                    <p class="ms-3 mb-0">Badges and rankings</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-check" style="color: var(--green-accent);"></i>
                                                    <p class="ms-3 mb-0">Live support 24/7</p>
                                                </div>

                                                <!-- Button -->
                                                <div class="container text-center mt-5">
                                                    <div wire:click='getStarted'
                                                        class="btn btn-primary d-md-block p-2 mx-5">GET STARTED</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center mt-5">
                    <a href="{{ route('profile') }}" class="text-muted">Skip it, maybe later.</a>
                </div>

            </div>
        </section>

    @elseif ($currentState === 'card')
        <!-- Section: Subscriptions -->
        <section id="card">
            <div class="container mt-3 p-5" style="background-color: white;">
                <div class="row">
                    <!-- Upper section -->
                    <div class="col text-center px-5">
                        <h3 class="mt-2">Payment Details</h3>
                    </div>
                </div>

                <!-- Main content -->
                <!-- Payment Details -->
                <div class="row mt-5 pb-5">
                    <div class="col d-flex justify-content-center">
                        <div class="mt-10">
                            <div class="row">
                                <!-- Card number -->
                                <div class="col">
                                    <p class="mb-0">Debit/Credit Card Number:</p>
                                    <input type="text" name="card-number" wire:model='cardNumber' class="form-control"
                                        name="creditCardNumber" placeholder="XXXX XXXX XXXX XXXX"
                                        pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}">
                                    @error('cardNumber')
                                    <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Expiration date -->
                                <div class="col-sm-4">
                                    <p class="mb-0">Expiration Date:</p>
                                    <input type="text" name="card-date" wire:model='cardDate' class="form-control"
                                        placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/[0-9]{2}">
                                    @error('cardDate')
                                    <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- CVC -->
                                <div class="col-sm-8">
                                    <p class="mb-0">CVC: <span class="text-muted fa-sm ms-1"> (3 last digits on the
                                            back)</span></p>
                                    <input type="text" name="card-cvc" wire:model='cardCVC' class="form-control"
                                        placeholder="XXX">
                                    @error('cardCVC')
                                    <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirm button -->
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-primary" wire:click='saveCard' type="button">Confirm Payment Details</button>
                </div>


                <div class="row text-center mt-5">
                    <a href="{{ route('profile') }}" class="text-muted">Skip it, maybe later.</a>
                </div>
            </div>
        </section>

    @elseif($currentState === 'confirm')
         <!-- Section: confirmation -->
        <section id="confirmation" >
            <div class="container mt-3 p-5" style="background-color: white;" >
                <!-- Progress bar & title -->
                <div class="row">
                    <!-- Upper section -->
                    <div class="col text-center px-5">
                            <h3 class="mt-2">Confirm Payment</h3>
                    </div>
                </div>

                <!-- Main content - Confirmation (card and plan)-->
                <div class="row mt-5">
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
                                    <span style="color: white;">{{ $card->getCardDisplay() }}</span>
                                </div>
                                
        
                                <div class="row mx-0 mt-2" style=" background-color: #12B05D; border-radius: 0rem 0rem 0.5rem 0.5rem;">
                                    <span class="my-3 ms-2" style="font-size: 18px; color:white; font-weight: 600;">Exp <span style="font-weight: 500; font-size:14;">{{ $card->card_date }}</span></span>
                                </div>
                            </div>
                          
                        </div>
                        
    
    
                        
                    </div>
    
                    <!-- Right side -->
                    <div class="col">
                        <!-- Pricing Card -->
                        <p>Selected Plan: </p>
                        <div class="card border-2 rounded-2"
                            style="border-color: var(--green-accent) !important; max-width:400px;">
                            <div class="card-body">
    
                                <!-- Plan title -->
                                <div class="row text-start">
                                    <h5>Basic Plan</h5>
                                </div>
    
                                <!-- Price -->
                                <div class="row text-start mt-2">
                                    <div>
                                        <span class="h2" style="font-weight: 600;">£99/</span><span
                                            class="h5">yr</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                           
                </div>        
                


                <!-- Confirm button -->
                <div class="col mt-5 text-center">
                    <p>£99 will be billed from your debit/credit card.</p>
                    <button wire:click='createSub' class="mt-5 btn btn-primary" type="button">Complete Transaction</button>
                </div>
                

                <div class="row text-center mt-5">
                    <a href="{{ route('profile') }}" class="text-muted">Skip it, maybe later.</a>
                </div>
            </div>
        </section>
    

    @elseif($currentState === 'complete')
         <!-- Section: Complete -->
        <section id="complete" >
            <div class="container mt-3" style="background-color: white;" >
                <div class="row">
                    <!-- Upper section -->
                    <div class="col text-center px-5">
                        <h3 class="mt-2">Subscription Activated!</h3>
                        <span>Thank you for joining</span>
                    </div>
                </div>

                <!-- Main content -->
                <div class="row text-center">
                    <div>
                        <img src="{{ asset('images/transaction-complete.jpg') }}" style="max-width: 400px;" class="img-fluid" alt="Transaction Complete">

                        <p class="mt-2" >Start tracking Green Actions!</p>
                        <button  onclick="window.location='{{ route('profile') }}';" class="btn btn-primary mb-5" style="min-width: 200px !important;">View My Profile!</button>
                    </div>
                </div>
            </div>
        </section>
    
    @elseif ($currentState === 'active')

        <!-- Section: Active Subscription -->
        <section id="active" >
            <div class="container mt-3" style="background-color: white;" >
                <div class="row">
                    <!-- Upper section -->
                    <div class="col text-center px-5">
                        <h3 class="mt-2">Active Subscription</h3>
                    </div>
                </div>
                
                <!-- Main content -->
                <div class="row text-center mt-5">
                    <div>
                        <span class="mt-5">Good news!</span>
                        <p class="mt-2" >Your subscription is active until {{ $subscriptionDate }}</p>
                        
                        <button onclick="window.location='{{ route('profile') }}';" class="btn btn-primary my-5 px-5" >View my Profile Page</button>
                    </div>
                </div>
            </div>
        </section>
    @else
        
    @endif



</div>