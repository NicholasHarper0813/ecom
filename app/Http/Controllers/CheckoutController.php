<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Order;

class CheckoutController extends Controller
{
   /* public function step1(){
        if(Auth::check()){
            return redirect()->route('checkout.shipping');
        }
        return redirect('login');
    } */

    public function shipping(){
        return view('front.shipping-info');
    }

    public function payment(){
        return view('front.payment');
    }

    public function storePayment(Request $request){
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_Y7jtBFM6zWukYzhCkqqkwBs200EUtzCu20');

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request->stripeToken;
        try{
            $charge = \Stripe\Charge::create([
            'amount' => Cart::total()*100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'receipt_email' => 'phiwesj90@hotmail.com',
            'source' => $token,
            ]);
        } catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }
        //Create the order
        Order::createOrder();

        //redirect user to some page
        return "Order Completed";
    }
}
