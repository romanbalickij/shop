<?php

use App\Model\HotProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $this->call(CategoryTableeSeed::class);
          $this->call(ProductTableSeed::class);
          $this->call(HotProductTableSeed::class);
          $this->call(BrandsTableSeed::class);
          $this->call(AttributesTableSeeder::class);
          $this->call(AttributeValuesTableSeeder::class);

    }
}
