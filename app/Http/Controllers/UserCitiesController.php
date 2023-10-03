<?php

namespace App\Http\Controllers;

use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with(["error" => "Ulogujte se za likovanje grada"]);
        }

        UserCities::create([
            'city_id'=>$city,
            'user_id'=>Auth::id()
        ]);

        return redirect()->back();
    }
}
