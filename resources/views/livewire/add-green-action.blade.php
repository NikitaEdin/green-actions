<div>
    <h5>Add new action:</h5>
    <form action="" wire:submit.prevent='submitAction'>
        <div class="row">
            <div class="col">
                <p class="text-muted mt-0">Action name:</p>
                <select wire:model.live="selectedAction"  aria-placeholder="Select" id="greenActionDropdown" class="form-select" aria-label="Select Action">
                    <option value="-1" selected>Select Green Action</option>
                    @foreach ($greenActions as $greenAction)
                        <option data-description="{{ $greenAction->action_description }}" value="{{ $greenAction->id }}">
                            {{ $greenAction->action_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Contribution Level selector -->
            <div class="col-xl-5">
                <p>Contribution level:</p>
                <button name="con-level-none" style="text-transform: uppercase;" wire:click="setActiveButton('none')" type="button" class="btn btn-outline-primary con-level con-level-none{{ $activeButton === 'none' ? '-active' : '' }}">
                    none
                </button>

                <button name="con-level-medium" style="text-transform: uppercase;" type="button" wire:click="setActiveButton('medium')"
                    class="btn btn-outline-primary con-level con-level-medium{{ $activeButton === 'medium' ? '-active' : '' }}">
                    medium
                </button>

                <button name="con-level-high" style="text-transform: uppercase;" wire:click="setActiveButton('high')" type="button" class="btn btn-outline-primary con-level con-level-high{{ $activeButton === 'high' ? '-active' : '' }}">
                    high
                </button>
                <p name="">{{ $selectedPoints }}</p>
            </div>
        </div>

        {{-- Errors on creation/updating --}}
        @if (session()->has('action-error'))
        <span class="d-block fs-6 text-danger">{{session('action-error')}}</span>
        @endif


        <span class="text-muted mt-2" style="display: {{ $actionDescription ? 'block;' : 'none;' }}">Action description:<br></span>
        <span class="lead fs-6" style="display: {{ $actionDescription ? 'block;' : 'none;' }}" >{{ $actionDescription }}</span>
       
        <!-- New Action - Submit button -->
        <div class="row">
            <div class="container mt-4">
                <button type="submit" type class="btn btn-primary" style="width: auto;">Add Action</button>
            </div>
        </div>
    </form>

    
    
    
</div>
