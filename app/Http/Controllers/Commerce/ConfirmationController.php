<?php

namespace App\Http\Controllers\Commerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfirmationController extends Controller
{
    public function index()
    {
        if(!session()->has('success')) {
            return redirect('/');
        }
        return view('commerce.pages.thankyou');
    }
}
