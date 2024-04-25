<div class="">
    {{-- No selected user : show all --}}
    @if ($selectedUser < 0)
        @foreach ($users as $user)
            <div class="row my-2" style="background: white; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1); border-radius: 5px;">
                <div class="row mt-1">
                    <div class="col">
                        <p>{{ $user->displayNameFull()}}   
                            @if ($user->isAdmin())
                                <span class="badge rounded-pill text-bg-danger ms-1">Admin</span>
                            @endif
                            @if ($user->isDeactivated())
                                 <span class="text-danger">{{ $user->GetStatus() }}</span>
                            @endif
                        </p> 
                    </div>
                    <div class="col">
                        <p>{{ $user->email}}</p>    
                    </div>
                    <div class="col">
                        <p>Created: {{ $user->created_at->diffForHumans()}}</p>    
                    </div>
                    <div class="col-1">
                        <p> <i class="fa-solid fa-star fa-fw" style="color: orange;"></i>
                        </i> {{ $user->getGreenPoints()}}</p>    
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-success me-3">
                            <p style="display: inline; margin: 0;"> Public Profile</p>
                            <i class="fa-solid fa-user"></i>
                        </a>

                        <a href="#" wire:click='edit({{ $user->id }})' class="btn btn-outline-info me-3">
                            <p style="display: inline; margin: 0;">Edit/Manage</p>
                            <i class="fa-solid fa-cog"></i>
                        </a>
                    </div>

                </div>
            </div>
            
        @endforeach
        {{ $users->links() }}


    
    @else {{-- SPECIFIC USER --}}
        {{-- Selected : edit user --}}
        <div class="m-1">

            {{-- View all (back) --}}
            <a class="nav-link ms-0 px-0" style="color: var(--green-accent);" aria-current="page" href="#"
            wire:click='viewAll'>  <i class="fas fa-arrow-left me-1"></i>All Users</a>
            
            {{-- Account Settings --}}
            <div class="row px-3 container">
                <h2 class="" style="display: inline;">Account Settings</h2>
                <hr class="mt-0" style="background-color:darkgray">
                <p class="" name="username">Editing Account: <span class="fs-5"> {{ $user->username }}</span></p>

                    <!-- Email section -->
                <div class="col-4">
                    <div class="row">
                        {{-- Header --}}
                        <div class="">
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

                <!-- Password section-->
                <div class="col-4">
                    <div class="row">
                        <div class="">
                            <!-- New password -->
                            <p class="mb-0">New Password:</p>
                            <input type="password" name="newPassword" wire:model='newPassword' class="form-control" placeholder="******">
                            @error('newPassword')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                            @enderror

                            <!-- Confirm password -->
                            <p class="mt-3 mb-0">Confirm Password:</p>
                            <input type="password" name="passwordConfirmation" wire:model='passwordConfirmation' class="form-control" placeholder="******">
                            @error('passwordConfirmation')
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

                {{-- Changing password warning --}}
                <div class="col-3">
                    <p class="mt-3 lead" style="font-size: 1rem;">Warning: <span style="text-decoration: underline">never</span> change a user's password without a SupportTicket.</p>
                </div>
            </div>

            {{-- Account Status --}}
            <div class="row px-3 container mt-5">
                <div class="col-4">
                    <p><span class="fs-5">Account Status: </span>
                        <span class="{{ $user->isDeactivated() ? 'text-danger' : '' }}">{{ $user->GetStatus() }}</span>
                    
                    </p>
                    {{-- ComoboBox for AccountStatus --}}
                    <div class="form-group">
                        <label for="account_status">Account Status:</label>
                        <select wire:model="newStatus" class="form-control" id="account_status" wire:click='selectedStatus($event.target.value)'>
                            <option value="Inactive">Inactive</option>
                            <option value="Active">Active</option>
                            <option value="Deactivated">Deactivated</option>
                        </select>
                        <button class="mt-2 btn btn-primary" wire:click="updateStatus" class="btn btn-primary">Update Status</button>
                    </div>

                    @if($showWarning)
                        <div class="alert alert-warning" role="alert">
                            Warning: Deactivating is equivalent to banning, user won't be able to login.
                        </div>
                    @endif


                    {{-- Success message --}}
                    @if (session()->has('success-status'))
                    <div class="container mt-2">
                        <div class="row">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success-status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>


            {{-- Personal Details --}}
            <div class="row mt-5 container">
                <h2 class="" style="display: inline;">Personal Settings</h2>
                <hr class="mt-0" style="background-color:darkgray">

                {{-- Display name --}}
                <div class="col-6">
                    <div class="form-group">
                        <label for="displayname">Display name <span class="text-muted">(visible to others)</span></label>
                        <input type="text" class="form-control" id="displayName" wire:model='displayName' name="displayName" placeholder="{{ $user->name }}">
                        @error('displayName')
                                <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Contact Person name --}}
                    <div class="form-group">
                        <label for="contact">Contact person</label>
                        <input type="text" class="form-control" wire:model='contact' id="contact" name="contact"  placeholder="{{ $user->contact }}">
                        @error('contact')
                            <div class="form-label d-block fs-6 text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Telephone number --}}
                    <div class="form-group">
                        <label for="number">Telephone number</label>
                        <input type="tel" class="form-control" wire:model="number" id="number" name="number" placeholder="{{ $user->number }}">
                        @error('number')
                            <div class="form-label d-block fs-6 text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Bio --}}
                    <div class="form-group">
                        <label for="bio">Bio <span class="text-muted">(visible to others)</span></label>
                        <textarea class="form-control" wire:model="bio" rows="3" name="bio" placeholder="{{ $user->bio }}"></textarea>
                        @error('bio')
                            <div class="form-label d-block fs-6 text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    @error('personal')
                        <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                    @enderror
                    <button class="mt-3 btn btn-primary" wire:click='savePersonal' type="button" id="save-personal">Save Personal Details</button>
                    
                    {{-- Success message --}}
                    @if (session()->has('success-personal'))
                        <div class="container mt-2">
                            <div class="row">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success-personal') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>

            {{-- Other Settings --}}
            <div class="row mt-5 container">
                <h2 class="" style="display: inline;">Other Settings</h2>
                <hr class="mt-0" style="background-color:darkgray">

                 {{-- Success message --}}
                 @if (session()->has('success-other'))
                 <div class="container mt-2">
                     <div class="row">
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session('success-other') }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     </div>
                 </div>
                @endif

                <div class="col-6">
                    {{-- Card --}}
                    <section id="SavedCard">
                        <h5>Saved Card:</h5>
                        @if ($user->hasCard())
                            <p>Card ending with: {{ $user->getCard()->getCardDisplay() }}</p>
                            <button class="btn btn-danger" wire:click='removeCard' type="button">Remove saved card</button>
                        @else
                            <p class='ms-3'>No saved card found.</p>
                        @endif
                    </section>

                    {{-- Green Actions --}}
                    <section id="GreenActions" class="my-4">
                        <h5>Green Actions:</h5>
                        <p class="mb-0">Total Points: {{ $user->getGreenPoints() }}</p>
                        <p>Total GreenActions (items): {{ $user->getUserActions()->get()->count() }}</p>
                        @if ($user->getUserActions()->get()->count() > 0)
                            <button class="btn btn-danger" wire:click='removeGreenActions' type="button" >Remove ALL GreenActions</button>
                        @endif
                    </section>


                    {{-- Subscription --}}
                    <section id="Subscription">
                        <h5>Subscription:</h5>

                        @if ($user->hasValidSubscription())
                            {{-- Calculate time left for subscription  --}}
                            @php
                                $validTo = $user->getValidSubscription()->valid_to;
                                $now = now();
                                $diff = $now->diffInMonths($validTo);
                                $durationLeft = $diff . ($diff === 1 ? ' month' : ' months') . ' left';
                            @endphp

                            <p class="mb-0">Subscription active until: {{ $user->getValidSubscription()->valid_to }}</p>
                            <p>Subscription expires in {{ $durationLeft }}</p>
                            <button class="btn btn-outline-success" wire:click='increaseSubscription' type="button">Add 1 month to subscription</button>
                            <button class="mx-3 btn btn-danger" wire:click='removeSubscription' type="button">Remove Subscription</button>
                        @else
                            <p class="ms-2">User has no active subscription.</p>
                        @endif

                    </section>

                    {{-- Remove Account --}}
                    <section id="removeAccount" class="my-5">
                        <h5>Delete Account</h5>
                        @if($confirmingDelete)
                            <div class="alert alert-warning" role="alert">
                                Are you sure you want to delete this account?
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-danger" wire:click="deleteAccount">Yes, delete</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary" wire:click="$set('confirmingDelete', false)">Cancel</button>

                                    </div>

                                </div>
                            </div>
                        @else
                            <button type="button" class="btn btn-danger" wire:click="$set('confirmingDelete', true)">Delete Account</button>
                    @endif

                        <p class="mt-2 text-danger" style="font-size:1rem;">Warning: account removal is final and cannot be undone.</p>

                    </section>
                </div>
            </div>
        </div>
    @endif

    @livewireScripts
    
</div>
