<?php

namespace App\Model;

use App\Traits\DiscountPriceTrait;
use App\Traits\StoreImageTrait;
use Illuminate\Database\Eloquent\Model;

class HotProduct extends Model
{

    use StoreImageTrait, DiscountPriceTrait;

    protected  $fillable = ['product_id'];



}
