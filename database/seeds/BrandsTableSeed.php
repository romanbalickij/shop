<?php

use App\Model\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Asos', 'slug' =>'Asos'],
            ['name' => 'Mango','slug' =>'Mango'],
            ['name' => 'River Island', 'slug' =>'River Island'],
            ['name' => 'Topshop', 'slug' =>'Topshop'],
            ['name' => 'Zara', 'slug' =>'Zara'],
        ];

        Brand::insert($data);
    }
}

