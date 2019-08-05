<?php

namespace App\Model;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = [
        'first_name', 'last_name', 'country_id', 'address', 'postal_code', 'city', 'province' , 'phone',
        'email', 'subtotal', 'payment_gateway', 'shipped'
    ];

    public static function createOrders($data)
    {
        if($data !=null) {
            Order::create([
                'first_name' => $data->first_name,
                'last_name'  => $data->last_name,
                'country_id' => $data->country,
                'address'    => $data->address,
                'postal_code'=> $data->postal_code,
                'city'       => $data->city,
                'province'   => $data->province,
                'phone'      => $data->phone,
                'email'      => $data->email,
                'subtotal'   => Cart::subtotal() ,
            ]);
        }


    }
}
