<?php

namespace App\Http\Controllers\Commerce;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{

    public function index() {

        $products = Product::orderBy('created_at', 'desc')->get();
        return view('commerce.pages.shop', compact('products'));
    }
}
