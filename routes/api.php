<?php

use App\Http\Controllers\API\TambonController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/provinces', [ TambonController::class , 'getProvinces' ]);
// Route::get('/province/{province_code}/amphoes', [TambonController::class , 'getAmphoes' ]);
// Route::get('/province/{province_code}/amphoe/{amphoe_code}/tambons', [ TambonController::class , 'getTambons' ]);
// Route::get('/province/{province_code}/amphoe/{amphoe_code}/tambon/{tambon_code}/zipcodes', [TambonController::class, 'getZipcodes'] );

Route::get('/provinces', [ TambonController::class , 'getProvinces' ]);
Route::get('/amphoes', [TambonController::class , 'getAmphoes' ]);
Route::get('/tambons', [ TambonController::class , 'getTambons' ]);
Route::get('/zipcodes', [TambonController::class, 'getZipcodes'] );