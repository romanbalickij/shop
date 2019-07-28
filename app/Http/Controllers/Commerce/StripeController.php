<?php

namespace App\Http\Controllers\Commerce;


use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $contents = Cart::content()->map(function ($item){
            return  $item->model->name .'-Quantity:'.$item->qty;
        })->values()->toJson();;

      $charge = Stripe::charges()->create ([
            "amount"   => Cart::subtotal(),
            "currency" => "usd",
            "source"   => $request->stripeToken,
            "description" => "Orders ot shop commerce",
            'metadata' => [
                'contents' => $contents,
                'quantity' => Cart::content()->count()
            ],
        ]);

        return redirect()->route()->with('success','Thank you! Your payment has been successful');
    }
}
