<?php

namespace App\Http\Controllers;

use App\Livewire\CartBadge;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller {
    
    // STATIC prices
    const donation_price = 10;
    const shortfall_price = 100;

    

    public function show(){
        // GreenActions
        $product_greenPoints = [
            'name' => 'Green Points',
            'price' => 100,
            'quantity' => 1,
            'img' => 'images/products/product-points.png',
            'is_available' => false,
            'unavailable_message' => 'Unavailable'
        ];

        if(Auth::check()){
            $greenPoints = Auth::user()->getGreenPoints();
            $hasBoughtPoints = Auth::user()->getUserPointSum() > 0;
            
            if($greenPoints >= 80 && $greenPoints < 100 && !$hasBoughtPoints){
                $shortfall = 100 - $greenPoints;
                $product_greenPoints = [
                    'name' => 'Green Points',
                    'quantity' => $shortfall,
                    'price' => self::shortfall_price,
                    'img' => 'images/products/product-points.png',
                    'is_available' => true
                ];
            }
        }
       
        
        // Donation
        $product_donation = [
            'name' => 'Donation',
            'price' => self::donation_price,
            'quantity' => 1,
            'img' => 'images/products/product-donation.png',
            'is_available' => true
        ];

        $donation = CartBadge::getItem('Donation');
        if($donation){
            $product_donation['quantity'] = $donation['quantity'];
        }

        $products = [$product_greenPoints, $product_donation];

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
        if(session()->has('payment')){
            $cart = CartBadge::getCart();
            return view('shop.cart-payment', compact('cart'));
        }else{
            return redirect()->route('shop');
        }
    }
}
