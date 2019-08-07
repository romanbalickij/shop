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


        $products = Product::where(function ($query) use ($request){
            $brandId  = $request->has('brands') ? $request->brands : null;
            $min      = $request->has('min')    ? $request->min    : null;
            $max      = $request->has('max')    ? $request->max    : null;


            if(isset($min)){
                $query-> where('original_price','<=',$max);
                $query-> Where('original_price','>=',$min);
            }
            if(isset($brandId)) {
                $query->whereIn('brand_id', $brandId);
           }


              $query->orderBy('created_at', 'desc');

        })->paginate(10);


       // $products    = Product::orderBy('created_at', 'desc')->paginate(10);
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

    public function brand($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrfail();
        $products = $brand->products()->paginate(5);
        return view('commerce.pages.brand', compact('brand', 'products'));

    }

    public function hotProduct()
    {
        $hot_products = HotProduct::join('products','products.id','=','product_id')->paginate(5);
        return view('commerce.pages.hot_product', compact('hot_products'));
    }

    public function sort(Request $request) {




        return view('commerce.pages.shop', compact('products'));


    }


}
