<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\PassportController;
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

Route::post('register', [PassportController::class, 'register']);
Route::post('login', [PassportController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('realestate', RealEstateController::class);
});

Route::get('cache', function(){
    //return RealEstate cache but if it doesnt exist on first place it stores on cache;
    return Cache::remember('realestates', 60*60, function(){
        return App\Models\RealEstate::all();
    });
});


 
