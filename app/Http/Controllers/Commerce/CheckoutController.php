<?php

namespace App\Http\Controllers\Commerce;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Model\Country;
use App\Model\Order;
use App\Model\Product;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
       $countries = Country::all();
       return view('commerce.pages.checkout', compact('countries'));
    }

    public function store(CheckoutRequest $request)
    {



        try {
            Product::checkoutDetailsCart($request->stripeToken);
            Order::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'country_id' => $request->country,
                'address'    => $request->address,
                'postal_code' =>$request->postal_code,
                'city'       => $request->city,
                'province'   => $request->province,
                'phone'      => $request->phone,
                'email'      => $request->email,
                'subtotal'   => Cart::subtotal() ,

            ]);
            Cart::destroy();
            return redirect()->route('thankyou')->with('success', 'Thank you! Your payment has been successful');

        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
