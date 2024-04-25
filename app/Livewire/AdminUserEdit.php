<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminUserEdit extends Component {
    public $selectedUser = -1;

    ////// Selected user data //////
    public $user;


    // Email
    public $emailPlaceholder;
    public $email;
    // Password
    public $newPassword;
    public $passwordConfirmation;
    // Personal
    public $displayName;
    public $contact;
    public $number;
    public $bio;

    // Deletion
    public $confirmingDelete = false;

    // Status
    public $newStatus;
    public $showWarning = false;


    use WithPagination;

    public function render() {
        $users = User::paginate(5);
        $this->setPage(0);
        return view('livewire.admin-user-edit', ['users' => $users]);
    }

    public function edit($userID){
        $this->selectedUser = (int)$userID;
        $this->user = User::find((int)$userID);
        $this-> emailPlaceholder = $this->user->email;
    }

    public function viewAll(){
        $this->selectedUser = -1;
        $this->newStatus = 'Inactive';
        $this->showWarning = false;
    }

    //////////////////////// Per user actions ////////////////////////

    public function saveEmail(){
        // Validate
        $this->validate([
            'email' => 'required|email'
        ]);

      
        // Update user email
        $this->user->update(['email' => $this->email]);

        // Reset validation, fields
        $this->resetValidation('email');
        $this->emailPlaceholder = $this->email;
        $this->email = '';
        
        // Display flash message
        session()->flash('success-email', 'Email updated successfully!');
    }

    public function changePassword(){
         // Reset validation errors
         $this->resetValidation(['newPassword', 'passwordConfirmation']);

         $this->validate([
             'newPassword' => 'required',
             'passwordConfirmation' => 'required|min:3|same:newPassword'
         ]);
 
         // Update new password
         $this->user->update(['password' => Hash::make($this->newPassword)]);
         // Reset components
         $this->passwordConfirmation = '';
         $this->newPassword = '';
 
         // Display flash message
         session()->flash('success-password', 'Password updated successfully!');
    }

    public function savePersonal(){
        $this->resetValidation(['displayName', 'contact', 'number', 'bio']);

         // validate
         $this->validate([
            'displayName' => 'nullable|min:3|max:32',
            'contact' => 'nullable|min:3|max:32',
            'number' => 'nullable|min:3|max:15',
            'bio' => 'nullable|min:2|max:125'
        ]); 

        // Data to update
        $dataToUpdate = [];

        // List elements with content, ignore empty
        if (!empty($this->displayName)) {$dataToUpdate['name'] = $this->displayName;}
        if (!empty($this->contact)) {$dataToUpdate['contact'] = $this->contact;}
        if (!empty($this->number)) {$dataToUpdate['number'] = $this->number;}
        if (!empty($this->bio)) {$dataToUpdate['bio'] = $this->bio;}

        // Update use
        if (!empty($dataToUpdate)) {
            $this->user->update($dataToUpdate);
            
              // Successfully updated
              session()->flash('success-personal', 'Detailed Updated!');
        }else{
             session()->flash('success-personal', 'Nothing to update.');
        }

        // Clear fields
        $this->displayName = '';
        $this->contact = '';
        $this->number = '';
        $this->bio = '';
    }

    public function removeCard(){
        dd($this->user->name);
        
       // Check if card exists
       $card = $this->user->getCard();

       // Create card
       if($card){
           $card->delete();
       }

       // Display flash message
       session()->flash('success-other', 'Card removed successfully!');
    }

    public function removeGreenActions(){
        // Delete all
        $this->user->getUserActions()->delete();

        // Display flash message
        session()->flash('success-other', 'GreenActions removed successfully!');
    }

    public function increaseSubscription(){
        if($this->user->hasValidSubscription()){
            // Get current sub
            $sub = $this->user->getValidSubscription();

            // Add 1 month and update DB
            $validTo = Carbon::parse($sub->valid_to);
            $newValidTo = $validTo->addMonth();
            $sub->update(['valid_to' => $newValidTo]);

            // Display flash message
            session()->flash('success-other', 'Subscription extended by 1 month.');
        }
    }

    public function removeSubscription(){
        if($this->user->hasValidSubscription()){
            // Delete current sub
            $this->user->getValidSubscription()->delete();

            // Display flash message
            session()->flash('success-other', 'Subscription removed successfully!');
        }
    }


    public function deleteAccount() {
        if($this->confirmingDelete == false){
            $this->confirmingDelete = true;
            return;
        }
        // Check if the user has a valid subscription
        if ($this->user->hasValidSubscription()) {
            $subscription = $this->user->getValidSubscription();
            $subscription->delete();
        }

        // Delete user associated items
        if($this->user->getUserActions()->exists()){
            $this->user->getUserActions()->delete();
        }
        if($this->user->getTickets()->exists()){
            $this->user->getTickets()->delete();
        }
        
        // Delete USER
        $this->user->delete();

        // 
        $this->confirmingDelete = false;
        $this->viewAll();
    }

    public function updateStatus(){
        // Update new status
        $this->user->account_status = $this->newStatus;
        $this->user->save();

        session()->flash('success-status', 'Status updated successfully.');
    }

    public function selectedStatus($status){
        if ($this->newStatus === 'Deactivated') {
            $this->showWarning = true;
        } else {
            $this->showWarning = false;
        }
    }

}
