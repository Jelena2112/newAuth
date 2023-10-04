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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $url = "https://reqres.in/api/users/2";
//        $response = Http::post("https://reqres.in/api/create", [
//            "name" => "ola",
//            "job" => "dev"
//        ]);
//        $response = $response->json();

//        $response = $response->body();
//
//        $response = json_decode($jsonResponse, true);
//
//        dd($response['name']);

        $city = $this->argument("city");

        $response = Http::get("https://api.weatherapi.com/v1/current.json" ,[
            'key' => "303b134c174f46ed9ab200805230310",
            'q' => $city,
            'aqi' => "no"
        ]);

        dd($response->json());
    }
}
