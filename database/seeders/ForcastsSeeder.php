<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Carbon\Carbon;
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
            $lastTemp = null;

            for($i = 0;  $i < 5;  $i++)
            {
                $weather = ForecastModel::WEATHER[rand(0,3)];

                $probability = null;

                if($weather == 'rainy' || $weather == 'snowy')
                {
                    $probability = rand(1,100);
                }

                $temperature = null;

                if($lastTemp !== null)
                {
                    $minTemp = $lastTemp -5;
                    $maxtemp = $lastTemp +5;
                    $temperature = rand($minTemp, $maxtemp);
                }
                else{
                    switch ($weather)
                    {
                        case ForecastModel::WEATHER[1]:
                            $temperature = rand(-50, 40);
                            break;

                        case ForecastModel::WEATHER[3]:
                            $temperature = rand(-50 , 15);
                            break;

                        case ForecastModel::WEATHER[0]:
                            $temperature = rand(-10, 40);
                            break;

                        case ForecastModel::WEATHER[2]:
                            $temperature = rand(-50, 1);
                            break;
                    }
                }

                ForecastModel::create([
                    "city_id" => $city->id,
                    "temperature" => $temperature,
                    'forecast_date' => Carbon::now()->addDays($i),
                    'weather_type' => $weather,
                    'probability' => $probability
                ]);

                $lastTemp = $temperature;
            }
        }

    }
}
