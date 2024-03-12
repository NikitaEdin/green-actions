@extends('layout.layout')

@section('content')
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ticket - GreenActions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- custo css --}}
        <link rel="stylesheet" href="css/common.css">
        </style>

    </head>

    <body style="background-color: whitesmoke;">
        <!-- Section: Ticket -->
        <section id="ticket">
            <div class="container p-3 mt-3 pb-5" style="background-color: white;">
                <div class="row">
                  <a href="{{ route('tickets') }}">Back to Tickets</a>
                    <!-- Upper section -->
                    <div class="row">
                        <div class="col">
                            {{-- Title --}}
                            <h4 class="mt-2 mb-3">Ticket: <span style="font-weight:300;">{{ $ticket->title }}</span></h4>

                            <span>Status: <span class="py-1 px-2" style="border-radius: 1rem; color:white; background-color: {{ $ticket->is_open ? 'green' : 'red' }}">{{ $ticket->is_open ? 'OPEN' : 'CLOSED' }}</span></span>

                            {{-- Admin controls --}}
                            @if (Auth::user()->isAdmin())
                           
                            
                              <form action="{{ route('ticket.update-status', ['id' => $ticket->id]) }}" class="container my-3" style="border-radius: 0.5rem; outline: 1px solid lightgray;" method="POST">
                                @csrf
                                  <p class="py-0 mb-1">Admin Controls:</p>
                                  <button type="submit" name="action" value="unlock" class="btn btn-primary mb-1"><span class="fa-solid fa-lock fa-fw"></span>Unlock Ticket</button>
                                  <button type="submit" name="action" value="lock" class="btn btn-danger mb-1"><span class="fa-solid fa-lock-open fa-fw"></span>Lock Ticket</button>
                                  <button type="button" class="btn btn-outline-danger mb-1" data-toggle="modal" data-target="#deleteTicketModal">Delete Ticket</button>
                              </form>

                              <!-- Delete Ticket Modal -->
                              <div class="modal fade" id="deleteTicketModal" tabindex="-1" role="dialog" aria-labelledby="deleteTicketModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="deleteTicketModalLabel">Delete Ticket</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Are you sure you want to delete this ticket?
                                      <p class="mt-2 text-muted">This will completely remove the ticket from the database.</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <form action="{{ route('ticket.update-status', ['id' => $ticket->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" name="action" value="delete" class="btn btn-danger" id="confirmDelete">Delete</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endif
                            

                            <p>Author: {{ $ticket->getUser()->displayNameFull() }}</p>

                            @if ($ticket->is_open || Auth::user()->isAdmin())
                              {{-- Form: add new message --}}
                              <form action="{{ route('ticket.add-message', ['id' => $ticket->id]) }}" method="POST">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col mb-3">
                                        <label for="ticketContent" class="form-label">New Message:</label>
                                        <textarea class="form-control" id="ticketContent" name="ticketContent" style="max-height: 300px;" rows="3"></textarea>
                                        @error('ticketContent')
                                              <span class="d-block fs-6 text-danger">{{ $message }}</span>
                                          @enderror
                                    </div>

                                </div>
                                <button type="submit" class="mt-1 btn btn-primary" type="button">Send New Message</button>
                              </form>


                            @else
                            <div class="container mt-3">
                                <p class="text-muted">Ticket closed - cannot enter new messages.</p>
                            </div>
                            @endif
                            
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="mt-5">
                        <h4>Messages</h4>
                        <hr class="mt-0" style="background-color:darkgray">

                        @foreach($ticketMessages as $message)
                        <!-- Message -->
                        <div class="mx-0 my-2 row py-3" style="border-radius: 0.5rem; {{ ($message->getUser()->isAdmin() ? "background-color: rgba(255, 0, 0, 0.056);" : "") }}">
                            <div class="row">
                                <!-- Username -->
                                <div class="col">
                                    <a href="{{ route('user.show', ['id' => $message->getUser()->id]) }}" style="font-weight: 600;">{{ $message->getUser()->displayNameFull() }}</a>
                                    {{-- Admin Badge --}}
                                    @if ($message->getUser()->isAdmin())
                                      <span class="badge rounded-pill text-bg-danger ms-1">Admin</span>
                                   @endif
                                </div>
                                <!-- Created - timeForHumans -->
                                <div class="col-auto">
                                    <span class="text-muted">{{ $message->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <!-- Message content -->
                            <div class="row">
                                <span>{{ $message->content }}</span>
                            </div>
                        </div>
                    @endforeach
                      {{ $ticketMessages->links() }}
                    
                    </div>

                </div>
            </div>
        </section>

        <!-- Empty spacer -->
        <div style="padding-top: 20rem;"></div>
    </body>

    
@endsection
