<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['name'];

    public function forecast()
    {
        return $this->hasMany(ForecastModel::class, 'city_id' , 'id')->orderBy('forecast_date');
    }

    public function todaysForecast()
    {
        return $this->hasOne(ForecastModel::class,'city_id', 'id')
            ->whereDate('forecast_date', Carbon::now());

    }
}

