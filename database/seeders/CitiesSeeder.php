<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myFaker = \Faker\Factory::create();

        for( $i = 0; $i < 100; $i++)
        {
            CitiesModel::create([
                'name' => $myFaker->city,
            ]);
        }

    }
}
