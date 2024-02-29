<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserAction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 

class UserActionComponent extends Component {

    public $userActions;

    public function mount($userActions){
        $this->userActions = $userActions;
    }

    // Remove specific green action from account
    public function removeAction($id){
        $userAction = UserAction::findOrFail($id);
        $userAction->delete();

        $this->userActions = $this->userActions->filter(function ($action) use ($id){
            return $action->id != $id;
        });

        $this->dispatch('update-point', points: Auth::user()->getGreenPoints());
        session()->flash('message', 'Green Action deleted.');
    }
    
    public function render() {
        return view('livewire.user-action-component');
    }


    #[On('action-created')]
    public function updateActions(){
        $this->userActions = Auth::user()->getUserActions()->orderBy('updated_at', 'desc')->get();

        $this->dispatch('update-point', points: Auth::user()->getGreenPoints());
    }
}
