<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller {

    public $ticketTitle, $ticketContent;

    // my tickets + new
    public function show(){
        $user = Auth::user();
        return view('tickets.show', compact('user'));
    }

    // on submit - create new ticket & redirect to it
    public function newTicket(){
        $validator = Validator::make(request()->all(), [
            'ticketTitle' => 'required|min:3|max:32',
            'ticketContent' => 'required|min:3|max:255'
        ]);
 
        // If fails - return with inputs
        if ($validator->fails()) {
            return redirect('tickets')->withErrors($validator)->withInput();
        }

        // Create new ticket
        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id; 
        $ticket->title = request('ticketTitle');
        $ticket->is_open = true; // By default: open on creation
        $ticket->save();

        // Create message
        $message = new Message();
        $message->ticket_id = $ticket->id;
        $message->user_id = Auth::user()->id;
        $message->content = request('ticketContent');
        $message->save();

        // Redirect the user or return a response as needed
        return redirect('tickets')->with('success', 'Ticket created successfully!');
    }

    // open ticket by id
    public function ticket($id){
        $ticket = Ticket::findOrFail($id);

        if(Auth::user()->id == $ticket->user_id || Auth::user()->isAdmin()){
            $ticketMessages = $ticket->messages()->orderBy('created_at', 'DESC')->paginate(5);
            return view('tickets.ticket', compact('ticket', 'ticketMessages'));
        }else{
            return redirect()->route('tickets');
        }
    }

    // Add message to ticket
    public function addMessage($ticketId){
        // Security check - prevent submitted message on locked ticket (besides Admin)
        $thisTicket = Ticket::findOrFail($ticketId);
        if(!$thisTicket->is_open && !Auth::user()->isAdmin()){  return redirect()->back(); }

        // Validate ticket content
        $validator = Validator::make(request()->all(), [
            'ticketContent' => 'required|min:3|max:255'
        ]);
 
        // Validation failed - return with inputs
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // All valid - Create message
        $message = new Message();
        $message->ticket_id = $ticketId;
        $message->user_id = Auth::user()->id;
        $message->content = request('ticketContent');
        $message->save();
         
        // Redirect back to ticket
        return redirect()->route('ticket', ['id' => $ticketId]);
    }

    // Admin Controls

    public function updateStatus($ticketId){
        // Not admin?
        if(!Auth::user()->isAdmin()){ return redirect()->route('tickets'); }

        // Get action type
        $action = request()->input('action');
        if($action === 'unlock'){
            // Get ticket by id
            $ticket = Ticket::find($ticketId);
            if($ticket){
                // Open current ticket
                $ticket->is_open = true;
                $ticket->save();
            }
        }else if($action === 'lock'){
            $ticket = Ticket::find($ticketId);
            if($ticket){
                // Lock current ticket
                $ticket->is_open = false;
                $ticket->save();
            }
        }else if($action === 'delete'){
            $ticket = Ticket::find($ticketId);
            if($ticket){
                // Complete delete ticket and linked messages
                $ticket->delete();
                return redirect()->route('tickets');
            }
        }
        return redirect()->back();
    }
}
