<?php

namespace App\Http\Controllers\Commerce;

use App\Model\Brand;
use App\Model\Category;
use App\Model\HotProduct;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use function GuzzleHttp\Promise\queue;

class ShopController extends Controller
{

    public function index(Request $request) {

        if($request->has('sort')) {
            $products = Product::sortProduct($request, 10);
            return view('commerce.pages.shop', compact('products'));
        }
          $products = Product::filterBrandAndPrice($request);
          return view('commerce.pages.shop', compact('products'));

//
// // це для адмінки яки категории  и пид категории є в продукта
//        $product = Product::with('categories.parent')->findOrFail(176);
//        $category = $product->categories->groupBy('parent_id');
//        @foreach($category  as  $children)
//
//
//
//            Parent {{$children->first()->parent->name}}<br>
//        @foreach($children as $child)
//        {{$child->name}}
//        @endforeach
//
//
//
//    @endforeach

    }

    public function category($slug)
    {
       $category = Category::where('slug', $slug)->firstOrFail();
       $products = $category->products()->paginate(10);
       return view('commerce.pages.shop', compact('products'));
    }

    public function hotProduct()
    {
        $hot_products = HotProduct::join('products','products.id','=','product_id')->paginate(5);
        return view('commerce.pages.hot_product', compact('hot_products'));
    }

    public function search(Request $request)
    {
                $products   = Product::where('name', 'like','%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%')
                    ->orWhere('sku', 'like', '%'.$request->search.'%')
                    ->orderBy('id', 'desc')
                    ->get();

       return view('commerce.pages.search_result', compact('products'));
    }


}
