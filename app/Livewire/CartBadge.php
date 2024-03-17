<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 
use Session;

class CartBadge extends Component {

    public $cart_items = 0;
    
    public function render() {
        $this->updateCart();
        return view('livewire.cart-badge');
    }

    public function updateCart(){
        $cart = CartBadge::getCart();
        if($cart){
            $total = CartBadge::getCount();
            $this->cart_items = $total > 10 ? '10+' : $total;
        }else{
            $this->cart_items = 0;
        }
    }

    public function addItem($product){
        $cart = CartBadge::getCart();
        $cart[] = $product;
        CartBadge::saveCart($cart);
    }

    public function removeItem($product){
        $itemName = $product['name'];

        $cart = CartBadge::getCart();
    
        foreach ($cart as $index => $item) {
            if ($item['name'] === $itemName) {
                unset($cart[$index]);
                break; 
            }
        }
    
        CartBadge::saveCart($cart);
    }

    public static function itemExists($product) {
        $itemName = $product['name'];
        $cart = CartBadge::getCart();
    
        foreach ($cart as $item) {
            if ($item['name'] === $itemName) {
                return true; 
            }
        }
        return false; 
    }

    public static function getItem($itemName) {
        $cart = CartBadge::getCart();
    
        foreach ($cart as $item) {
            if ($item['name'] === $itemName) {
                return $item; 
            }
        }
        return null; 
    }
    
    

    public function getAllItems(){
        //return CartBadge::getCart();
        dd(CartBadge::getCart());
    }

    public function getCount(){
        return count(CartBadge::getCart());
    }

    public function clearCart(){
        CartBadge::saveCart([]);
    }
    

    public static function getCart() {
        $userId = Auth::id();
        return Session::get("user_cart_$userId", []);
    }

    public static function saveCart($cart)  {
        $userId = Auth::id();
        Session::put("user_cart_$userId", $cart);
    }

    
    #[On('add-cart')] 
    public function addToCart($product) { 
         $product = $product['product'];
        // if(!CartBadge::itemExists($product)){
        //     $this->addItem($product); 
        // }

        $cart = self::getCart();
        $found = false;

        // Check if exists
        foreach($cart as $item){
            if($item['name'] === $product['name']){
                // Update quantity
                $item['quantity'] += $product['quantity'];
                $found = true;
                break;
            }
        }

        // If not found, add new
        if(!$found){
            $this->addItem($product); 
        }
    }

    #[On('update-cart')] 
    public function onUpdateCart() { 
        $this->updateCart();
    }

    public static function globalRemoveItem($product){
        $itemName = $product['name'];

        $cart = CartBadge::getCart();
    
        foreach ($cart as $index => $item) {
            if ($item['name'] === $itemName) {
                unset($cart[$index]);
                break; 
            }
        }
    
        CartBadge::saveCart($cart);
    }

    public static function globalAddToCart($product) { 
        $cart = self::getCart();
        $found = false;

        // Check if exists
        foreach($cart as &$item){ // Note the & before $item to iterate by reference
            if($item['name'] === $product['name']){
                // Update quantity
                $item['quantity'] = intval($product['quantity']);
                $found = true;
                break;
            }
        }

        // If not found, add new
        if(!$found){
            $cart[] = $product;
        }
        self::saveCart($cart);
   }
}
