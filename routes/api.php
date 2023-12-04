<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Exemple avec des controllers basés sur des ressources
/*
Route::get('/bebes', [BebeController::class, 'index']);
Route::post('/bebes', [BebeController::class, 'store']);

Route::delete('/bebes/{bebe}', [BebeController::class, 'destroy']);
Route::resource('bebes', BebeController::class);
*/

use App\Http\Controllers\BebeApiController;

Route::apiResource('bebes', BebeApiController::class);
