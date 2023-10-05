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

        $jsonResponse = $response->json();

        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }
        dd($jsonResponse);


    }
}






    10 sajtova

    itmentorstva.com
    ns1.godaddy.com - ns1.plus.rs
    ns2.godaddy.com - ns2.plus.rs

    -> hosting: plus.rs

    mysqli_connect("localhost", "test", "123456789")

















