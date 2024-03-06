<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 

class ProfileBadges extends Component
{
    public User $user;

    public $badge_greenstatus_enabled = false;
    public $badge_fulldetails_enabled = false;
    //public $badge_greenstatus_enabled = false;

    public function mount($user){
        $this->user = $user;
        $this->init();
    }

    public function init(){
        // 100 green points
        $this->badge_greenstatus_enabled = $this->user->hasGreenStatus();
        // full profile details (all fields are filled)
        $this->badge_fulldetails_enabled = $this->user->hasFullDetails();

        // TODO: third badge
    }

    public function render()
    {
        return view('livewire.profile-badges');
    }

    #[On('action-created')] 
    public function updateBadges() {
        // refresh green badge
        $this->badge_greenstatus_enabled = $this->user->hasGreenStatus();
    }
}
