<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'temperature' => 'required',
            'city_id' => 'required|exists:cities,id'
        ]);

        $weatherTemp = WeatherModel::where(['city_id' => $request->get('city_id')])->first();
        $weatherTemp->temperature = $request->get('temperature');
        $weatherTemp->save();

        return redirect()->back();

    }

    public function AddForecast(Request $request)
    {
       $request->validate([
           'city_id' => 'required|exists:cities,id',
           'temperature' => 'required',
           'weather_type' => 'required',
           'forecast_date' => 'required',
       ]);

       ForecastModel::create($request->all());
        return redirect()->back();
    }
}
