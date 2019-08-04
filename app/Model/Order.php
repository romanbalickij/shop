<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = [
        'first_name', 'last_name', 'country_id', 'address', 'postal_code', 'city', 'province' , 'phone',
        'email', 'subtotal', 'payment_gateway', 'shipped'
    ];
}
