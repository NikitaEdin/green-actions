<?php

namespace App\Http\Controllers;

use App\Livewire\CartBadge;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Decimal;

class ShopController extends Controller {
    
    public function show(){
      

        // GreenActions
        $product1 = [
            'name' => 'Green Points',
            'price' => 100,
            'quantity' => 1,
            'img' => 'images/products/product-points.png',
            'is_available' => false,
            'unavailable_message' => 'Unavailable'
        ];

        if(Auth::check()){
            $greenPoints = Auth::user()->getGreenPoints();
            if($greenPoints >= 80 && $greenPoints < 100){
                $shortfall = 100 - $greenPoints;
                $product1 = [
                    'name' => 'Green Points',
                    'quantity' => $shortfall,
                    'price' => 100,
                    'img' => 'images/products/product-points.png',
                    'is_available' => true
                ];
            }
        }
       
        
        // Donation
        $product2 = [
            'name' => 'Donation',
            'price' => 10,
            'quantity' => 1,
            'img' => 'images/products/product-donation.png',
            'is_available' => true
        ];

        $donation = CartBadge::getItem('Donation');
        if($donation){
            $product2['quantity'] = $donation['quantity'];
        }



        $products = [$product1, $product2];

        return view('shop.show', compact('products'));
    }


    public function cart(){
        // Get cart items
        $item_greenPoints = CartBadge::getItem('Green Points');
        $item_donation = CartBadge::getItem('Donation');
        
        return view('shop.cart', compact('item_greenPoints', 'item_donation'));
    }

    public function confirm(){

        // Green Points
        $points = CartBadge::getItem('Green Points');

        // Donation
        $donation = CartBadge::getItem('Donation');
        $donationAmount = request('donationValue');


        if($donation){
            $donation['quantity'] =  intval($donationAmount);
            CartBadge::globalAddToCart($donation);
           
        }
      
        return redirect()->route('pay-cart')->with('payment', 'ready');   
    }




    // Payment - final
    public function pay(){
        // can view payment ONLY if confirmed cart
        // if(session()->has('payment')){
            $cart = CartBadge::getCart();
            return view('shop.cart-payment', compact('cart'));
        // }else{
        //     return redirect()->route('shop');
        // }
    }
}
