<?php

namespace App\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class AccountSettings extends Component
{

    public $user;
    public $email;
    public $emailPlaceholder;
    public $currentPassword;
    public $newPassword;

    public $cardNumber;
    public $cardDate;
    public $cardCVC;


    public function mount($user){
        $this->user = $user;
        $this->init();
    }

    public function init(){
        $this->emailPlaceholder = $this->user->email;

        $card = $this->user->card()->first();
    }

    public function render()
    {
        return view('livewire.account-settings');
    }


    public function saveEmail(){
        // Validate
        $this->validate([
            'email' => 'required|email'
        ]);

      
        // Update user email
        Auth::user()->update(['email' => $this->email]);

        // Reset validation, fields
        $this->resetValidation('email');
        $this->emailPlaceholder = $this->email;
        $this->email = '';
        
        // Display flash message
        session()->flash('success-email', 'Email updated successfully!');
    }

    public function changePassword(){
        // Reset validation errors
        $this->resetValidation(['currentPassword', 'newPassword']);

        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:3|different:currentPassword'
        ]);


        // Check provided current password matches the user's actual password
        if (!Hash::check($this->currentPassword, Auth::user()->password)) {
            $this->addError('currentPassword', 'The provided current password is incorrect.');
            return;
        }

        // Update new password
        Auth::user()->update(['password' => Hash::make($this->newPassword)]);
        // Reset components
        $this->currentPassword = '';
        $this->newPassword = '';

        // Display flash message
        session()->flash('success-password', 'Password updated successfully!');
    }

    public function saveCard(){
        // Reset validation errors
        $this->resetValidation(['cardNumber', 'cardDate', 'cardCVC']);

        // Validate card details
        $this->validate([
            'cardNumber' => 'required|digits:16',
            'cardDate' => 'required|date_format:m/y|after_or_equal:today',
            'cardCVC' => 'required|digits:3',
        ]);

        // Check if card exists
        $card = $this->user->card()->first();

        // Create card
        if(!$card){
            $card = new Card();
            $card->user_id = $this->user->id;
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

        // Display flash message
        session()->flash('success-card', 'Card added successfully!');
    }



}
