<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForcastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allCities = CitiesModel::all();

        foreach ($allCities as $city)
        {
            for($i = 0;  $i < 5;  $i++)
            {
                ForecastModel::create([
                    "city_id" => $city->id,
                    "temperature" => rand(5,28),
                    'forecast_date' => Carbon::now()->addDays(rand(2,55)),
                ]);
            }
        }

    }
}
