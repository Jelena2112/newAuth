<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    use HasFactory;

    protected $table = 'forecast';

    protected $fillable = ['city_id', 'temperature','forecast_date'];
}
