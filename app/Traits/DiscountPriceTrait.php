<?php


namespace App\Traits;


trait DiscountPriceTrait
{

    public function getDiscountPrice($discount_price, $original_price) {

        if($discount_price !=null) {
            $discount = $original_price / 100 * $discount_price ;
            $result = $original_price - $discount;
            return $result;
        }
    }
}