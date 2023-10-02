<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
  public function index(CitiesModel $city)
  {
        return view('forecast', ['city' => $city]);
  }


}
