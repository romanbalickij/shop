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
        if(Product::productsAreNoLongerAvailable()) {
            return redirect()->back()->withErrors('error_message', 'Unfortunately, the product is no longer available');
        }


        try {
            Product::checkoutDetailsCart($request->stripeToken);
            Order::createOrders($request);
            Product::decreaseQuantities();
            Cart::destroy();
            return redirect()->route('thankyou')->with('success', 'Thank you! Your payment has been successful');

        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
