<?php


use App\Model\HotProduct;
use App\Model\Product;
use Illuminate\Database\Seeder;

class HotProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            $categoryId = Product::inRandomOrder()->get('id')->first();
            HotProduct::create([
                'product_id' => $categoryId->id,
            ]);
        }
    }
}
