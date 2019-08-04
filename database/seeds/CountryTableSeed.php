<?php

use App\Model\Country;
use Illuminate\Database\Seeder;

class CountryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            $data = [
                ['country' => 'United States' ],
                ['country' => 'United Kingdom' ],
                ['country' => 'Germany' ],
                ['country' => 'France' ],
                ['country' => 'India' ],
                ['country' => 'Australia' ],
                ['country' => 'Brazil' ],
            ];

            Country::insert($data);

        }
}
