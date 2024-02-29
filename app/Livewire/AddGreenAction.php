<?php

namespace App\Livewire;

use App\Models\UserAction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddGreenAction extends Component
{

    public $greenActions;

    public $activeButton;
    public $selectedAction;

    // description
    public $actionDescription;
    public $actionDescriptionTitle;

    public function mount($greenActions){
        $this->greenActions = $greenActions;
    }

    public function submitAction(){
        
        // action picked and level selected?
        if(!(isset($this->activeButton) && $this->selectedAction !== null && $this->selectedAction >= 0)){
            session()->flash('action-error', 'Oh no! please select a GreenAction and the contribution level.');
            return;
        }


        $points = 0;        
        // Determine points based on active button
        switch($this->activeButton){
            case 'medium':
                    $points = 5;
                    break;
                case 'high':
                    $points = 10;
                    break;
        }

        // Create UserAction (if possible)
        UserAction::updateOrCreate([
            'user_id' => Auth::user()->id,
            'greenaction_id' => $this->selectedAction,
        ], 
        ['points' => $points]);

        $this->dispatch(('action-created'));

    }

    public function updatedSelectedAction($value){
        // Valid id
        if($value >= 0){
            $greenAction = $this->greenActions->where('id', $value)->first();
            $this->actionDescription = $greenAction->action_description;
        }else{
            $this->actionDescription = '';
        }
    }


    public function setActiveButton($name) {
        // Different button clicked
        if($name != $this->activeButton){
            $this->activeButton = $name;
        }else{
            // Same button - untoggle
            $this->activeButton = null;
        }
    }


    public function render() {
        return view('livewire.add-green-action');
    }
}
