<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->prefix('v1')->group(function () {
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    });
//});


Route::group(['prefix' => 'cm'], function () {
    Route::post('/login', [LoginController::class, 'login']);
});


//Route::prefix('/cm')->group( function(){
//    Route::post('/login', [LoginController::class, 'login']);
//});
