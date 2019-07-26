<?php

namespace App\Http\Controllers\Commerce;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $products = Product::getPopularProduct();
        return view('commerce.pages.home', compact('products'));
    }

    public function show($slug) {
        $product  = Product::where('slug', $slug)->firstOrFail();
        return view('commerce.pages.show', compact('product'));
    }
}
