<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $fillable = ['name', 'slug', 'description', 'featured', 'image', 'original_price',
    'discount_price', 'quantity', 'views', 'date '];
}
