<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccommodationController;
use App\Http\Controllers\Api\AirplaneTicketsController;
use App\Http\Controllers\Api\ContactsController;
use App\Http\Controllers\Api\SubscribersController;

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
Route::get('/accommodations', [AccommodationController::class, 'index']);
Route::post('/subscribers',[SubscribersController::class,'store']);
Route::post('/airplane-tickets',[AirplaneTicketsController::class,'store']);
Route::post('/contacts',[ContactsController::class,'store']);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
