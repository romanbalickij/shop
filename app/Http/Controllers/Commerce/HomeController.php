<?php

namespace App\Http\Controllers\Commerce;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {

      //  $categories  = Category::whereNull('parent_id')->with('children')->get();
        return view('commerce.pages.home', compact('categories'));
    }
}
