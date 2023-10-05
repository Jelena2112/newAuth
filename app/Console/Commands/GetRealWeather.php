<?php

namespace App\Console\Commands;

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

        $response = Http::get(env("WEATHER_API_URL")."v1/current.json" ,[
            'key' => env("WEATHER_API_KEY"),
            'q' => $city,
            'aqi' => "yes",
            'lang'=> "en",
        ]);

        $jsonResponse = $response->json();

        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }
        dd($jsonResponse);


    }
}






















