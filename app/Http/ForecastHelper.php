<?php

namespace App\Http;

use App\Models\ForecastModel;

class ForecastHelper
{
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


        if($weather == ForecastModel::WEATHER[0])
        {
            $icon = "fa-cloud-rain";
        }
        elseif ($weather == ForecastModel::WEATHER[2])
        {
            $icon = "fa-snowflake";
        }
        elseif ($weather == ForecastModel::WEATHER[1])
        {
            $icon = "fa-snowflake";
        }
        return $icon;
    }
}
