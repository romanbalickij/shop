<?php

use Illuminate\Database\Seeder;

class ProductImageTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Model\Product::all();
        $image = [
            'product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg','product-5.jpg',
            'product-6.jpg','product-7.jpg','product-8.jpg','product-9.jpg','product-big-1.jpg'
        ];

        foreach ($products as $product) {
            \App\Model\ProductImage::create([
            'product_id' => $product->id,
             'thumbnail' => array_random($image),
             'full'      => array_random($image)

        ]);
        }
    }
}
