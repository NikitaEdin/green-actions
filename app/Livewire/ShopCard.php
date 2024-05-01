<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 

class ShopCard extends Component
{

    public $product;

    public function mount($product){
        $this->product = $product;
    }

    public function render() { 
        return view('livewire.shop-card');
    }

    public function addToCart(){
        if(Auth::check()){
            $this->dispatch('add-cart', ['product'=> $this->product]);
        }else{
            return redirect()->route('login');
        }
    }
}
