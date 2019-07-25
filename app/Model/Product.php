<?php

namespace App\Model;

use App\Traits\DiscountPriceTrait;
use App\Traits\StoreImageTrait;
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

    public function hotProducts()
    {
        return  $this->hasMany(HotProduct::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public static function  getPopularProduct(){

        return self::orderBy('views','desc')->take(5)->get();
    }

}
