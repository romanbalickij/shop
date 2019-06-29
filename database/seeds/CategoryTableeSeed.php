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
                ['parent_id' => 1, 'name' => 'Dresses',  'slug' => 'Women\'s Dresses'],
                ['parent_id' => 1, 'name' => 'Blouses',  'slug' => 'Women\'s Blouses'],
                ['parent_id' => 1, 'name' => 'T-shirts', 'slug' => 'Women\'s T-shirts'],
                ['parent_id' => 1, 'name' => 'Rompers',  'slug' => 'Women\'s Rompers'],
                ['parent_id' => 1, 'name' => 'Panties',  'slug' => 'Women\'s Panties'],
                ['parent_id' => 2, 'name' => 'T-Shirts', 'slug' => 'Men\'s T-Shirts'],
                ['parent_id' => 2, 'name' => 'Polo',     'slug' => 'Men\'s Polo'],
                ['parent_id' => 2, 'name' => 'Jackets',  'slug' => 'Men\'s Jackets'],

                ['parent_id' => 3, 'name' => 'Dresses', 'slug' => 'Kid\'s Dresses'],
                ['parent_id' => 3, 'name' => 'Shirts',  'slug' => 'Kid\'s Shirts'],
                ['parent_id' => 3, 'name' => 'Jackets', 'slug' => 'Kid\'s Jackets'],

        ];

        Category::insert($data);
    }
}
