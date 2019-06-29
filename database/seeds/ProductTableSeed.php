<?php

use App\Model\Product;
use Illuminate\Database\Seeder;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Product::class,5)->create();

        factory(Product::class, 30)->create()->each(function($product) {
            $product->categories()->sync(
                \App\Model\Category::whereNotNull('parent_id')->with('children')->get()->random(1)
            );
        });
    }
}
