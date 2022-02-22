<?php

use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\KategoriaController;
use App\Http\Controllers\Api\RendezoController;
use App\Http\Controllers\Api\SzineszController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/filmek', FilmController::class);
Route::resource('/kategoriak', KategoriaController::class);
Route::resource('/rendezok', RendezoController::class);
Route::resource('/szineszek', SzineszController::class);
