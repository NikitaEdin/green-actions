<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgotPassword extends Component
{

    public $email;
    public $token;
    public $password;
    public $password_confirmation;
    public $resetTokenExists = false;
    public $resetComplete = false;
    public $user;

    public function render() {
        return view('livewire.forgot-password');
    }

    public function sendResetLink() {
        // Validate
        $this->validate([ 'email' => 'required|email|min:3' ]);

        // Get associated user
        $this->user = User::where('email', $this->email)->first();

        if ($this->user) {
            $this->resetTokenExists = true;
        } else {
            $this->addError('email', 'Email not found.');
        }
    }

    public function resetPassword() {
        // Something wrong?
        if(!$this->resetTokenExists || !$this->user){
            $this->addError('auth', 'Something went wrong, try again.');
            return;
        }

        // Validate
        $this->validate([ 
            'password' => 'required|confirmed|min:3'
        ]);

        

        // Update new password
        $this->user->update(['password' => Hash::make($this->password)]);

        $this->resetComplete = true;
    }

    public function goLogin(){
        $this->redirect('login');
    }
}
