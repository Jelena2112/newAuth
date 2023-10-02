<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->city;

        $city = CitiesModel::where("name", "LIKE" , "%$cityName%")->get();

        return view('searchResults',["search" => $city]);

    }
}
