<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request)
    {
        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with(["error" => "Ulogujte se za likovanje grada"]);
        }
    }
}
