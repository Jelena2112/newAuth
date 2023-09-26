<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Psy\VersionUpdater\Downloader\Factory;

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
