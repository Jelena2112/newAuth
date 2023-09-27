<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allCities = CitiesModel::all();

        foreach ($allCities as $city)
        {
            $weather  = WeatherModel::where(['city_id' => $city->id])->first();

            if($weather != null)
            {
                $this->command->getOutput()->error("Ovaj grad postoji");
                continue;
            }

            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand(1,35)
            ]);
        }
    }
}
