<?php

namespace App\Model;

use App\Traits\DiscountPriceTrait;
use App\Traits\StoreImageTrait;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use StoreImageTrait, DiscountPriceTrait;

    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'featured'  =>  'boolean'
    ];

    protected  $fillable = ['name', 'slug', 'description','sku' ,'featured', 'image', 'original_price',
    'discount_price', 'quantity', 'views', 'date '];

    public function categories() {
        return $this->belongsToMany(Category::class,'product_category');
    }

    public function hotProducts(){
        return  $this->hasMany(HotProduct::class);
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class,
            'order_products','product_id','order_id')->withPivot('quantity','price');
    }

    public static function  getPopularProduct(){
        return self::orderBy('views','desc')->take(5)->get();
    }

    public  static function checkoutDetailsCart($token)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->name . '-Quantity:' . $item->qty;
        })->values()->toJson();

        $charge = Stripe::charges()->create([
            "amount" => Cart::subtotal(),
            "currency" => "usd",
            "source" => $token,
            "description" => "Orders ot shop commerce",
            'metadata' => [
                'contents' => $contents,
                'quantity' => Cart::content()->count()
            ],
        ]);

    }
    public function stock(){

        if($this->quantity > 0) {
            return 'IN Stock';
        }
           return 'End Stock';
    }

    public static function  decreaseQuantities(){
        foreach (Cart::content() as $cartProduct) {
            $product = Product::find($cartProduct->model->id);
            $product->quantity  = $product->quantity - $cartProduct->qty;
            $product->save();

          //  $product->update(['quantity' => $product->quantity - $cartProduct->qty]);
        }

    }

    public static function  productsAreNoLongerAvailable(){
        foreach (Cart::content() as $productInCart) {
            $product = Product::findOrFail($productInCart->id);

            if ($product->quantity < $productInCart->qty) {
                return true;
            }
        }
           return false;
    }


    public static function filterBrandAndPrice($request)
    {
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

        return $products;
    }

    public static function sortProduct($request, $number)
    {
        switch ($request->sort) {
            case 'rated':
                $result = Product::orderBy('views', 'desc')->paginate($number);
                break;
            case 'newest':
                $result  = Product::orderBy('date', 'desc')->paginate($number);
                break;
            case 'expensive':
                $result  = Product::orderBy('original_price', 'desc')->paginate($number);
                break;
            case 'cheap':
                $result  = Product::orderBy('original_price', 'asc')->paginate($number);
                break;
        }
        return $result;

    }

}
