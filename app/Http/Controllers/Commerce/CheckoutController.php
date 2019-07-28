<?php

namespace App\Http\Controllers\Commerce;

use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {

       return view('commerce.pages.checkout');
    }

    public function store(Request $request)
    {

        $contents = Cart::content()->map(function ($item) {
            return $item->model->name . '-Quantity:' . $item->qty;
        })->values()->toJson();;

        try {
            $charge = Stripe::charges()->create([
                "amount" => Cart::subtotal(),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Orders ot shop commerce",
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::content()->count()
                ],
            ]);

            return redirect()->route('thankyou')->with('success', 'Thank you! Your payment has been successful');

        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
