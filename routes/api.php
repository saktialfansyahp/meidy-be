<?php

use App\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartAPIController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::resource('/produkapi', ProdukAPIController::class);
 Route::resource('/cartapi', CartAPIController::class);
 Route::resource('/pesanan', PesananController::class);

 Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::group([
        'middleware' => 'auth:api'
    ], function(){
        Route::get('data', [AuthController::class, 'data']);
        Route::get('dataUser', [AuthController::class, 'dataUser']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('destroy/{id}', [AuthController::class, 'destroy']);
    });
});


