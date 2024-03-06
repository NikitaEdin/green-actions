<div>

    {{-- Alert message --}}
    @if (session()->has('message'))
        <div class="container my-2">
            <div class="row">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        </div>
    @endif


    @if ($userActions->isEmpty())
        {{--  Display message of no green actions found for user--}}
        <div class="container text-center">                
            <p>No GreenActions found.</p>
        </div> 
    @else
        {{-- Main loop for user green actions --}}
        @foreach ($userActions as $userAction)
            <div class="container d-flex justify-content-between mb-2 py-2"
                style="background-color: white; border-radius: 0.5rem;">
                <!-- Left side -->
                <h5 class="align-self-center lead flex-lg-shrink-0 ">{{ $userAction->getGreenAction->action_name }}</h5>
                <p class="text-muted align-self-center p-2 mb-1 ms-3 flex-fill ">
                    {{ $userAction->getGreenAction->action_description }}</p>

                <!-- Right side -->
                <div class="align-items-center d-flex justify-content-end">
                    {{-- <span class="me-3 text-muted fs-6">Contribution Level: </span> --}}
                    <!-- Adjust class dynamically based on contribution level -->
                    <div
                        class="btn btn-outline-primary con-level con-level-{{ $userAction->points === 0 ? 'none' : ($userAction->points === 5 ? 'medium' : 'high') }}-active">
                        {{ $userAction->points === 0 ? 'NONE' : ($userAction->points === 5 ? 'MEDIUM' : 'HIGH') }}
                    </div>
                    <!-- Button to remove action -->
                    @auth
                        @if ((Auth::user()->id == $user->id && !$disableEdits )  || Auth::user()->isAdmin() ) <!-- self or admin -->
                            <button wire:click="removeAction(({{ $userAction->id }}))" class=" btn btn-outline-danger fs-6 pt-0"
                                style="border-radius: 1rem; font-weight: 600; margin-inline-start: 1rem;">x</button>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    @endif
</div>
