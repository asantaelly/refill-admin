<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\Auth\API\UserController;

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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function() {

    Route::get('/fuel', [FuelController::class, 'index']);
    Route::get('/fuel/{id}', [FuelController::class, 'show']);
    Route::post('/fuel', [FuelController::class, 'store']);
    Route::put('/fuel/{id}', [FuelController::class, 'update']);

    Route::post('/logout', [UserController::class, 'logout']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

