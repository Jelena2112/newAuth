<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->city;

        $city = CitiesModel::with('todaysForecast')->where("name", "LIKE" , "%$cityName%")->get();

        if(count($city) == 0)
        {
            return redirect()->back()->with('error', 'Nemamo rezultate za vasu pretragu');
        }

        return view('searchResults',["search" => $city]);

    }
}
