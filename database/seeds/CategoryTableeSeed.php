<?php

use App\Model\Category;
use Illuminate\Database\Seeder;

class CategoryTableeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['parent_id' => null, 'name' => 'Women\'s Collection', 'slug' => 'Women\'s Collection'],
            ['parent_id' => null, 'name' => 'Men\'s Collection', 'slug' => 'Men\'s Collection'],
            ['parent_id' => null, 'name' => 'Kid\'s Collection', 'slug' => 'Kid\'s Collection'],
                ['parent_id' => 1, 'name' => 'Dresses',  'slug' => 'Dresses'],
                ['parent_id' => 1, 'name' => 'Blouses',  'slug' => 'Blouses'],
                ['parent_id' => 1, 'name' => 'T-shirts', 'slug' => 'T-shirts'],
                ['parent_id' => 1, 'name' => 'Rompers',  'slug' => 'Rompers'],
                ['parent_id' => 1, 'name' => 'Panties',  'slug' => 'Panties'],
                ['parent_id' => 2, 'name' => 'T-Shirts', 'slug' => 'T-Shirts'],
                ['parent_id' => 2, 'name' => 'Polo',     'slug' => 'Polo'],
                ['parent_id' => 2, 'name' => 'Jackets',  'slug' => 'Jackets'],

                ['parent_id' => 3, 'name' => 'Dresses', 'slug' => 'Dresses'],
                ['parent_id' => 3, 'name' => 'Shirts',  'slug' => 'Shirts'],
                ['parent_id' => 3, 'name' => 'Jackets', 'slug' => 'Jackets'],

        ];

        Category::insert($data);
    }
}
