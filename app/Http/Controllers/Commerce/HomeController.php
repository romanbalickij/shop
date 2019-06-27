<?php

namespace App\Http\Controllers\Commerce;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('commerce.pages.home', compact('categories'));
    }
}
