<div>

    {{-- Success messages --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- Auth related errors --}}
    @error('auth')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror


    <div>
        @if ($resetComplete)
            <p class="text-success">Password reset successfully!</p>
            <button wire:click="goLogin" name="login" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
        @else
            @if (!$resetTokenExists)
                <!-- Initial form -->
                <div class="mb-3">
                    <p>Enter your email to reset your password.</p>
                    <input type="email" wire:model="email" id="email" name="email" class="form-control"
                        class="form-control bg-light fs-6" placeholder="Email Address">
                    @error('email')
                        <span class="d-block fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3 mt-2">
                    <button wire:click="sendResetLink" name="forgot" class="btn btn-lg btn-primary w-100 fs-6">Request Password Reset</button>
                </div>
                <p class="text-muted pt-2" style="font-style: italic; font-size: 13px;">Disclaimer: for practice purposes, the reset link will not be sent.</p>
            @else
                <!-- Password reset form -->
                <div class="mb-3">
                    <p>Enter your new password.</p>
                    <input type="password" id="password" name="password" wire:model='password'
                        class="form-control bg-light fs-6 mb-3" placeholder="Enter your new password">
                    @error('password')
                        <span class="form-label d-block fs-6 text-danger">{{ $message }}</span>
                    @enderror


                    <input type="password" name="password_confirmation" id="confirm-password"
                        wire:model='password_confirmation' class="form-control bg-light fs-6 mb-5"
                        placeholder="Confirm new password">
                    @error('password_confirmation')
                        <span class="d-block fs-6 text-danger">{{ $message }}</span>
                    @enderror


                    <div class="input-group mb-3 mt-2">
                        <button class="btn btn-lg btn-primary w-100 fs-6" wire:click='resetPassword'>Reset
                            Password</button>
                    </div>



                    @error('email')
                        <span class="d-block fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif

        @endif
    </div>
</div>
