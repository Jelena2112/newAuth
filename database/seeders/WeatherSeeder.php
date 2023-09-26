<?php

namespace Database\Seeders;

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
        $weather = [
            "Beograd" => 21,
            "Sokobanja" => 24,
            "Brisel" => 25,
            "Amsterdam" => 26
        ];

        foreach ($weather as $city => $temp)
        {
            WeatherModel::create([
                'city' => $city,
                'temperature' => $temp
            ]);
        }
    }
}
