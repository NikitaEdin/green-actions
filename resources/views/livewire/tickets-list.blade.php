<div>

    <style>
        .btn.btn-secondary.active{
            background-color: var( --green-accent) !important;
            color: white!important;
        }
    </style>

    {{-- is Admin --}}
    @if ($user->isAdmin())
    <div class="col p-2" style="border-radius: 0.5rem; outline: 1px solid gray;">

        <span class="fs-6"><span style="font-weight: 600;">Admin controls</span> - Filter by:</span>
        <div class="btn-group" role="group" aria-label="Tickets Type">
            <button wire:click="filterTickets('self')" class="btn btn-secondary {{ $filter === 'self' ? 'active' : '' }}">My Tickets</button>
            <button wire:click="filterTickets('open')" class="btn btn-secondary {{ $filter === 'open' ? 'active' : '' }}">Open Tickets</button>
            <button wire:click="filterTickets('closed')" class="btn btn-secondary {{ $filter === 'closed' ? 'active' : '' }}">Closed Tickets</button>
            <button wire:click="filterTickets('all')" class="btn btn-secondary {{ $filter === 'all' ? 'active' : '' }}">All</button>
        </div>

    </div>
    @endif


    <hr class="mt-0" style="background-color:darkgray">
    @if ($tickets->count() > 0)

    @foreach($tickets as $ticket)
    <!-- Ticket -->
    <div class="mx-0 my-2 row py-3" style="outline: 1px solid lightgray;border-radius: 0.5rem;">
        <!-- Title -->
        <div class="col align-self-center">
            <h5>Title: <span class="lead">{{ $ticket->title }}</span></h5>
            <span>Created by: <a href="{{ route('user.show', ['id' => $ticket->getUser()->id]) }}" style="font-weight: 600;">{{ $ticket->getUser()->displayNameFull() }}</a></span>
            <span class="ms-3"> {{ $ticket->created_at->diffForHumans() }}</span>
        </div>
       
        <!-- Status -->
        <div class="col-auto align-self-center">
            <span class="me-5">Status: <span style="color: {{ $ticket->is_open ? 'green' : 'red' }}">{{ $ticket->is_open
                    ? 'OPEN' : 'CLOSED' }}</span></span>
        </div>
        <!-- View Ticket Button -->
        <div class="col-auto align-self-center">
            <button onclick="window.location.href='{{ route('ticket', ['id' => $ticket->id]) }}'"
                class="btn btn-primary">View Ticket</button>

        </div>
    </div>

    @endforeach

    <div class="mt-3">
        {{ $tickets->links() }}
    </div>
    @else
    <p>No tickets found.</p>
    @endif
</div>