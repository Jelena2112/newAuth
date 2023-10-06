<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->city;

        Artisan::call("app:get-real-weather",['city' => $cityName]);

        $city = CitiesModel::with('todaysForecast')->where("name", "LIKE" , "%$cityName%")->get();

        if(count($city) == 0)
        {
            return redirect()->back()->with('error', 'Nemamo rezultate za vasu pretragu');
        }

        $userFavouriteCity =[];

        if(Auth::check())
        {
            $userFavouriteCity = Auth::user()->userFavouriteCity;
            $userFavouriteCity = $userFavouriteCity->pluck('city_id')->toArray();
        }


//        dd($userFavouriteCity);

        return view('searchResults',["search" => $city, 'userCities' => $userFavouriteCity]);

    }
}
