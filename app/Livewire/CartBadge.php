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

    // Update cart
    public function updateCart(){
        // Get cart
        $cart = CartBadge::getCart();
        // Valid cart?
        if($cart){
            // get total cart items
            $total = CartBadge::getCount();
            // display '10+' if above 10 items
            $this->cart_items = $total > 10 ? '10+' : $total;
        }else{
            // set cart items to zero
            $this->cart_items = 0;
        }
    }

    // Add item to cart
    public function addItem($product){
        // get cart
        $cart = CartBadge::getCart();
        // add item to cart
        $cart[] = $product;
        // save changes
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
    
    

    // unused, for testing purposes
    public function getAllItems(){ dd(CartBadge::getCart()); }

    public function getCount(){
        return count(CartBadge::getCart());
    }

    public function clearCart(){
        CartBadge::saveCart([]);
    }
    

    // Get cart from session
    public static function getCart() {
        $userId = Auth::id();
        return Session::get("user_cart_$userId", []);
    }

    // Save cart to session
    public static function saveCart($cart)  {
        $userId = Auth::id();
        Session::put("user_cart_$userId", $cart);
    }

    
    // Traceable method, will be called outside of current component
    #[On('add-cart')] 
    public function addToCart($product) { 
        // Get product structure from passed object (array)
        $product = $product['product'];

        // Get cart reference
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

        // If not found, add as new item
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

        // Get cart
        $cart = CartBadge::getCart();
    
        // remove item from cart
        foreach ($cart as $index => $item) {
            if ($item['name'] === $itemName) {
                unset($cart[$index]);
                break; 
            }
        }
        // save changes
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
