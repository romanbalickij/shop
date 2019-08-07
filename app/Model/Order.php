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

    public function products(){
        return $this->belongsToMany(Product::class,
            'order_products', 'order_id', 'product_id')->withPivot('quantity','price');
    }

    public  function createOrderProduct() {
            foreach (Cart::content() as $product){
                $this->products()->attach($product->id, ['quantity'=> $product->qty, 'price' => $product->price]);
            }

    }

    public static function createOrders($data)
    {
        if($data !=null) {
        $order =     Order::create([
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
     return $order;

    }
}
