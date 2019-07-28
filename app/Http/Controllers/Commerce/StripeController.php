<?php

namespace App\Http\Controllers\Commerce;


use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StripeController extends Controller
{
    public function stripe(Request $request)
    {

    }
}
