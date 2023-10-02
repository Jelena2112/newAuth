<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ForecastsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/', 'welcome');

Route::get('/prognoza', [WeatherController::class, 'index']);

Route::prefix('/admin')->group(function (){
    Route::view('/weather','admin.weather');
    Route::post('/weather/update' , [AdminController::class,'update'])->name('admin.weather.update');
    Route::view('/forecasts','admin.forecast');
    Route::post('/forecasts/addForecast',[AdminController::class, 'AddForecast'])->name('admin.add.forecast');
});

Route::get('/forecast/search', [ForecastsController::class, 'search'])->name('forecast.search');

Route::get('/forecast/{city:name}', [ForecastController::class, 'index'])->name('forecast.any');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
