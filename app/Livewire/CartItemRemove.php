<?php

namespace App\Livewire;

use Livewire\Component;

class CartItemRemove extends Component
{

    public $product;

    public function mount($product){
        $this->product = $product;
    }

    public function removeItem(){
        CartBadge::globalRemoveItem($this->product);
        $this->dispatch('update-cart');
    }

    public function render()
    {
        return view('livewire.cart-item-remove');
    }
}
