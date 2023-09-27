<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userCity = $this->command->getOutput()->ask("Enter City name");
        $userTemp = $this->command->getOutput()->ask("Enter City temperature");

        if($userCity == null || $userTemp == null)
        {
            $this->command->getOutput()->error("City and temperature is required.");
        }

        $existingCityInDB = WeatherModel::where(['city'=> $userCity])->first();

       if( $existingCityInDB != null )
       {
           $this->command->getOutput()->error("$userCity alredy exists in DB" );
           return;
       }
       else{
           WeatherModel::create([
               'city' => $userCity,
               'temperature' => $userTemp
           ]);

           $this->command->getOutput()->comment('City and temperature is saved in DB');
       }









    }
}
