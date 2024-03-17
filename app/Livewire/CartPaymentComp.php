<?php

namespace App\Livewire;

use App\Models\Transaction;
use App\Models\Userpoints;
use Auth;
use Livewire\Component;

class CartPaymentComp extends Component{

    public $total = 0;
    public $cart;
    public $user;

    public bool $paymentComplete = false;

    public function mount($cart){
        $this->cart = $cart;
        $this->user = Auth::user();
        $this->calcTotal();
    }

    public function calcTotal(){
        foreach($this->cart as $item){
            $this->total += $item['price'] * $item['quantity'];
        }
    }


    public function render() {
        return view('livewire.cart-payment-comp');
    }

    public function confirmPayment(){
        //// Donation ////
        $donation_item = $this->getItem('Donation');
        
        // create new record in Transactions table
        if($donation_item){
            $transaction = new Transaction();
            $transaction->user_id = $this->user->id;
            $transaction->card_id = $this->user->getCard()->id;
            $transaction->name = $donation_item['name'];
            $transaction->quantity = $donation_item['quantity'];
            $transaction->price = $donation_item['price'];
            $transaction->save();
        }


        //// Green Points ////
        $points = $this->getItem('Green Points');
        if($points){
            // create new record in Transactions table
            $transaction = new Transaction();
            $transaction->user_id = $this->user->id;
            $transaction->card_id = $this->user->getCard()->id;
            $transaction->name = $points['name'];
            $transaction->quantity = $points['quantity'];
            $transaction->price = $points['price'];
            $transaction->save();


            // create new record in UserPoints table
            $userPoints = new Userpoints();
            $userPoints->user_id = $this->user->id;
            $userPoints->green_points = $points['quantity'];
            $userPoints->save();
        }


        // Clear cart
        CartBadge::saveCart([]);
        $this->dispatch('update-cart');

        // Redirect
        $this->paymentComplete = true;
        
    }

    private function getItem($itemName){
        foreach ($this->cart as $item) {
            if ($item['name'] === $itemName) {
                return $item; 
            }
        }
        return null; 
    }

}

