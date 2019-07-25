<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Model\Category;
use App\Model\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {


//    $image = [
//        'product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg','product-5.jpg',
//        'product-6.jpg','product-7.jpg','product-8.jpg','product-9.jpg','product-big-1.jpg'
//    ];
        $actual_price    = rand( 15.5, 100.5 );
        $discount_factor = ( 10 / 100 ) * $actual_price;
    return [

        'name'       => $name =  $faker->realText(40),
        'slug'       => Str::slug($name),
        'description'=> $faker->realText(200),
        'featured'   => true,
       // 'image'      => $faker->randomElement($image),
        'original_price' => $actual_price,
        'discount_price' => $discount_factor,
        'quantity'   => $faker->numberBetween(1,10),
        'views'      => $faker->numberBetween(1,100),
       // 'date ' => \Carbon\Carbon::now()



    ];


});
