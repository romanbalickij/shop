<?php


namespace App\Traits;


use App\Model\ProductImage;

trait StoreImageTrait
{

    public function getImage($id, $column = 'full' ) {
        $image = ProductImage::where('product_id', $id)->first();
        if($image !=null) {
            return  '/shop/img/product-img/'.$image[$column];
        }

    }

}