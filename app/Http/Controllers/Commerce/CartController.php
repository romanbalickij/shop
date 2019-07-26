<?php

namespace App\Http\Controllers\Commerce;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function store(Request $request) {

      $dublicates =   Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

      if($dublicates->isNotEmpty()) {
          return redirect()->back()->with('success', 'Product is already is you cart!');
      }

        Cart::add($request->id,$request->name,1,$request->price)->associate('App\Model\Product');
        return redirect()->back()->with('success', 'Product  was added to you cart!');
    }

    public function delete($id) {
        Cart::remove($id);
        return redirect()->back()->with('success','Product was delete !');
    }
}
