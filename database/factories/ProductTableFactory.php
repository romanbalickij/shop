<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Model\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {

    $num_originals = 9;
    $original_files_folder = '/shop/img';
    // randomly select an image
    $pathToFile = $original_files_folder . random_int(1, $num_originals) . '.jpg';

    $actual_price    = rand( 15.5, 100.5 );
    $discount_factor = ( 10 / 100 ) * $actual_price;
    return [

        'name' => $name =  $faker->realText(40),
        'slug'  => Str::slug($name),
        'description' => $faker->realText(200),
        'featured'  => true,
        'image' => $pathToFile,
        'original_price' => $actual_price,
        'discount_price' => $discount_factor,
        'quantity' => $faker->numberBetween(1,10),
        'views'  => $faker->numberBetween(1,100),
       // 'date ' => \Carbon\Carbon::now()
    ];
});
