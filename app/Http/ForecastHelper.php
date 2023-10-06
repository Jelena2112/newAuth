<?php

namespace App\Http;

use App\Models\ForecastModel;

class ForecastHelper
{

    const WEATHER_CONST = [
        "rainy" => "fas-cloud-rain",
        "snowy" => "fa-snowflake",
        "sunny" => "fa-sun",
        "cloudy" => "fa-cloud-sun",
    ];
    public static function getColorByTemp($temperature)
    {
        $color = null;
        if($temperature <= 0)
        {
            $color = "lightblue";
        }
        elseif($temperature >= 1 && $temperature <= 15)
        {
            $color = "blue";
        }
        elseif($temperature > 15 && $temperature <= 25)
        {
            $color = "green";
        }
        else
        {
            $color = "red";
        }

        return $color;

    }

    public static function getIconByWeather($weather)
    {
            if(in_array($weather, self::WEATHER_CONST))
            {
                return self::WEATHER_CONST[$weather];
            }
            return "fa-sun";

    }
}


