<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\PassportController;

use App\Jobs\TestLogJob;
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


Route::get('queue', function(){
    //return RealEstate cache but if it doesnt exist on first place it stores on cache;

    /* \Log::info(Carbon\Carbon::now()->format('Y-m-d H:i'));
        return 'test1'; */

    for($i = 0; $i < 5; $i++)
        TestLogJob::dispatch()->delay(now()->addSeconds(5));
    
    return 'Queue Example done';
});

 
