<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $fillable = ['name', 'slug', 'description', 'featured', 'image', 'original_price',
    'discount_price', 'quantity', 'views', 'date '];


    public function getImage() {

        if($this->image != null) {
            return  'shop/img/product-img/'.$this->image;
        }
    }

    public function getDiscountPrice() {

        if($this->discount_price !=null) {
           $discount = $this->original_price / 100 * $this->discount_price ;
           $result = $this->original_price - $discount;
           return $result;
        }


    }
}
