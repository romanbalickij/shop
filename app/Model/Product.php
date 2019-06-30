<?php

namespace App\Model;

use App\Traits\DiscountPriceTrait;
use App\Traits\StoreImageTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use StoreImageTrait, DiscountPriceTrait;

    protected  $fillable = ['name', 'slug', 'description', 'featured', 'image', 'original_price',
    'discount_price', 'quantity', 'views', 'date '];

    public function categories() {
        return $this->belongsToMany(Category::class,'product_category');
    }

    public function hotProducts()
    {
        return  $this->hasMany(HotProduct::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public static function  getPopularProduct(){

        return self::orderBy('views','desc')->take(5)->get();
    }

}
