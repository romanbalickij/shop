<?php

namespace App\Http\Controllers\Commerce;

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

    }
}
