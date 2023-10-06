<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
  public function index(CitiesModel $city)
  {

//      $response = Http::get(env("WEATHER_API_URL")."v1/astronomy.json" ,[
//          'key' => env("WEATHER_API_KEY"),
//          'q' => $city,
//          'api' => "no"
//      ]);
//
//      dd($response->json());
        return view('forecast', ['city' => $city]);
  }


}
