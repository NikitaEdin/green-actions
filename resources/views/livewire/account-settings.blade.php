<div>
    <!-- Section: Settings -->
    <section id="profile">
        <div class="container p-3 mt-3 pb-5" style="background-color: white;">
            <div class="row">
                <!-- Upper section -->
                <div class="">
                    <div class="row">
                        {{-- Header --}}
                        <div class="col-lg-6">
                            <h2 class="" style="display: inline;">Account Settings</h2>
                            <p class="mt-5" name="username" >Username: {{ $user->username }}</p>

                            <!--  Email -->
                            <p class="mb-0">Email Address:</p>
                            <input type="email" name="email" class="form-control" wire:model='email' placeholder="{{ $emailPlaceholder }}"
                                aria-label="Recipient's username" aria-describedby="email">
                            @error('email')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                            <button class="mt-3 btn btn-primary" wire:click='saveEmail' type="button" id="save-email">Save Email</button>
                            
                            {{-- Success message --}}
                            @if (session()->has('success-email'))
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success-email') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <h3>Password</h3>
                    <hr class="mt-0" style="background-color:darkgray">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Current password -->
                            <p class="mb-0">Current Password:</p>
                            <input type="password" name="password" wire:model='currentPassword' class="form-control" placeholder="******">
                            @error('currentPassword')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror

                            <!-- New password -->
                            <p class="mt-3 mb-0">New Password:</p>
                            <input type="password" name="password-new" wire:model='newPassword' class="form-control" placeholder="******">
                            @error('newPassword')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror
                            <button class="mt-3 btn btn-primary" wire:click='changePassword' type="button">Change Password</button>

                            {{-- Success message --}}
                            @if (session()->has('success-password'))
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success-password') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div class="row mt-5 pb-5">
                    <h3>Payment Details</h3>
                    <hr class="mt-0" style="background-color:darkgray">
                    
                    <div class="col-6">
                        <div class="mt-10">
                          
                            <div class="row">
                                <!-- Card number -->
                                <div class="col">
                                    <p class="mb-0">Debit/Credit Card Number:</p>
                                    <input type="text" name="card-number" wire:model='cardNumber' class="form-control" name="creditCardNumber"
                                        placeholder="XXXX XXXX XXXX XXXX" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}">
                                    @error('cardNumber')
                                        <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Expiration date -->
                                <div class="col">
                                    <p class="mb-0">Expiration Date:</p>
                                    <input type="text" name="card-date" wire:model='cardDate' class="form-control" placeholder="MM/YY"
                                        pattern="(0[1-9]|1[0-2])\/[0-9]{2}">
                                    @error('cardDate')
                                        <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- CVC -->
                                <div class="col">
                                    <p class="mb-0">CVC: <span class="text-muted fa-sm ms-1"> (3 last digits on the back)</span></p>
                                    <input type="text" name="card-cvc" wire:model='cardCVC' class="form-control" placeholder="XXX">
                                    @error('cardCVC')
                                        <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button class="mt-3 btn btn-primary" wire:click='saveCard' type="button">Save Card</button>

                            {{-- Success message --}}
                            @if (session()->has('success-card'))
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success-card') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Right col: display saved card for user --}}
                    @if ($user->hasCard())
                        <div class="col">
                            <p>Saved Card:</p>
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
                                        <span style="color: white;">{{ $user->getCard()->getCardDisplay() }}</span>
                                    </div>
                                    
            
                                    <div class="row mx-0 mt-2" style=" background-color: #12B05D; border-radius: 0rem 0rem 0.5rem 0.5rem;">
                                        <span class="my-3 ms-2" style="font-size: 18px; color:white; font-weight: 600;">Exp <span style="font-weight: 500; font-size:14;">{{ $user->getCard()->card_date }}</span></span>
                                    </div>
                                </div>
                            
                            </div>
                            {{-- Remove saved card --}}
                            <button wire:click='removeCard' class="m-3 btn btn-danger">Remove Card</button>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

</div>
