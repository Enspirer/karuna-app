<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('find_cities/{country}', [HomeController::class, 'find_cities'])->name('find_cities');
Route::post('get_cities_function', [HomeController::class, 'get_cities'])->name('get_cities');

Route::get('find_district_front/{id}', [HomeController::class, 'find_district_front'])->name('find_district_front');
Route::get('find_city_front/{id}', [HomeController::class, 'find_city_front'])->name('find_city_front');

