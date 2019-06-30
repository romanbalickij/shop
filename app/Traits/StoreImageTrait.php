<?php


namespace App\Traits;


trait StoreImageTrait
{

    public function getImage($image) {

        if($image != null) {
            return  '/shop/img/product-img/'.$image;
        }
    }
}