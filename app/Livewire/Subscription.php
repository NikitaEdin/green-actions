<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\Subscription as SubscriptionModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class Subscription extends Component {

    // ENUM for current state for panels
    const state_brief = 'brief';
    const state_card = 'card';
    const state_confirmation = 'confirm';
    const state_complete = 'complete';
    const state_active = 'active';

    public $currentState = self::state_brief;

    public $user;
    
    
    // Card
    public $cardNumber;
    public $cardDate;
    public $cardCVC;

    public Card $card;
    public $subscriptionDate;



    public function render() {
        // Get User
        $this->user = Auth::user();
        
        // Has valid subscription
        if($this->currentState == self::state_brief && $this->user->hasValidSubscription()){
            // Parse and format date
            $this->subscriptionDate = Carbon::parse($this->user->getValidSubscription()->valid_to);
            $this->subscriptionDate =  $this->subscriptionDate->format('d/m/Y');

            $this->setStatus(self::state_active);
        }else{

            // No subscription found - check card
            if($this->user->hasCard()){
                $this->card = $this->user->getCard();
            }
        }

        return view('livewire.subscription');
    }

    public function setStatus($status){
        if(in_array($status, [
            self::state_brief,
            self::state_card,
            self::state_confirmation,
            self::state_complete,
            self::state_active
        ])){
            $this->currentState = $status;
        }
    }


    // Registered panel - getStarted button
    public function getStarted(){
        if($this->currentState == self::state_brief){
            // Already active subscription
            if($this->user->hasValidSubscription()){
                $this->setStatus(self::state_complete);

            // No sub but has saved card
            }elseif($this->user->hasCard()){
                $this->setStatus(self::state_confirmation);
                 $this->card = Auth::user()->getCard();
            }else{

                // no sub, no card
                $this->setStatus(self::state_card);
            }
        }
    }

    // Card (in case we're missing the card)
    public function saveCard(){
        if($this->currentState != self::state_card) return;

        // Reset validation errors
        $this->resetValidation(['cardNumber', 'cardDate', 'cardCVC']);

        // Validate card details
        $this->validate([
            'cardNumber' => 'required|digits:16',
            'cardDate' => 'required|date_format:m/y|after_or_equal:today',
            'cardCVC' => 'required|digits:3',
        ]);

        // Check if card exists
        $card = Auth::user()->card()->first();

        // Create card
        if(!$card){
            $card = new Card();
            $card->user_id = Auth::user()->id;
        }

        // Update card details
        $card->card_number = $this->cardNumber;
        $card->card_date = $this->cardDate;
        $card->card_cvc = $this->cardCVC;
        $card->save();

        // Reset fields
        $this->cardNumber = '';
        $this->cardDate = '';
        $this->cardCVC = '';

        $this->card = $card;
        // Move to next stage
        $this->setStatus(self::state_confirmation);
    }

    public function createSub(){
        // Get user Card details from Auth::User()->getCard
        $user = Auth::user();

        // Create Subscription into Subscriptions table
        $subscription = new SubscriptionModel();

        // Set values
        $subscription->user_id = $user->id; 
        $subscription->valid_from = now(); 
        $subscription->valid_to = now()->addYear(); 
        $subscription->paid_amount = 99;

        // Save record
        $subscription->save();
        $this->setStatus(self::state_complete);
    }
}
