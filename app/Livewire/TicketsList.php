<?php

namespace App\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;



class TicketsList extends Component
{
    
    use WithPagination; 
    
    public $filter = 'self';

    public function render() {
        $user = Auth::user();

        if($user->isAdmin()){
            if($this->filter == 'self'){
                $tickets = Auth::user()->getTickets()->orderBy('created_at', 'DESC')->paginate(5);
            } elseif ($this->filter == 'open') {
                $tickets = Ticket::where('is_open', true)->orderBy('created_at', 'DESC')->paginate(5);
            } elseif ($this->filter == 'closed') {
                $tickets = Ticket::where('is_open', false)->orderBy('created_at', 'DESC')->paginate(5);
            }elseif($this->filter == 'all'){
                $tickets = Ticket::orderBy('created_at', 'DESC')->paginate(5);
            }
        }else{
            $tickets = Auth::user()->getTickets()->orderBy('created_at', 'DESC')->paginate(5);
        }
        
        $this->setPage(0);
        return view('livewire.tickets-list', [
            'user' => $user,
            'tickets' => $tickets

        ]);
    }

    public function filterTickets($filter){
       $this->filter = $filter;
    }
}
