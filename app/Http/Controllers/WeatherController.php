<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $prognoza = [
            "Beograd" => 21,
            "Sokobanja" => 24,
            "Brisel" => 25,
            "Amsterdam" => 26
        ];
        return view('weather',['prognoza' => $prognoza]);
    }
}
