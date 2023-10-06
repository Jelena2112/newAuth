<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-real-weather {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weather Api for current weather';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument("city");

        $cityInDB = CitiesModel::where(['name' => $city])->first();

        if($cityInDB == null)
        {
           $cityInDB =  CitiesModel::create(['name' => $city]);
        }

        $response = Http::get(env("WEATHER_API_URL")."v1/current.json" ,[
            'key' => env("WEATHER_API_KEY"),
            'q' => $city,
        ]);

        $jsonResponse = $response->json();

        if($cityInDB->todaysForecast != null)
        {
            $this->output->comment('Comanda je gotova');
            return;
        }

        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }

        $forecast = [
            "city_id" => $cityInDB->id,
            "forecast_date" => $jsonResponse['current']['last_updated'],
            "temperature" =>$jsonResponse['current']['temp_c'],
            "weather_type" =>$jsonResponse['current']['condition']['text'],
            "probability" =>$jsonResponse['current']['cloud'],
        ];

        ForecastModel::create($forecast);

        $this->output->comment("Dodata je prognoza");

    }
}






















