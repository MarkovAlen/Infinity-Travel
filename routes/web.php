<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\AccommodationsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\TicketsController;
use App\Models\Accomodation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//countries 
Route::get('/content.countries',[CountriesController::class,'index'])->name('countries');
Route::post('/content.countries',[CountriesController::class,'store'])->name('countries.store');
Route::put('/content.countries',[CountriesController::class,'edit'])->name('countries.edit');
Route::delete('/content.countries',[CountriesController::class,'destroy'])->name('countries.destroy');
//regions
Route::get('/content.regions',[RegionsController::class,'index'])->name('regions');
Route::post('/content.regions',[RegionsController::class,'store'])->name('regions.store');
Route::put('/content.regions',[RegionsController::class,'edit'])->name('regions.edit');
Route::delete('/content.regions',[RegionsController::class,'destroy'])->name('regions.destroy');
//accomodations
Route::get('/content.accommodations',[AccommodationsController::class,'index'])->name('accommodations');
Route::post('/content.accommodations',[AccommodationsController::class,'store'])->name('accommodations.store');
Route::put('/content.accommodations',[AccommodationsController::class,'edit'])->name('accommodations.edit');
Route::delete('/content.accommodations',[AccommodationsController::class,'destroy'])->name('accommodations.destroy');
Route::get('/get-accommodation-details/{id}', [AccommodationsController::class, 'getDetails']);

//rooms
Route::get('/content.rooms',[RoomsController::class,'index'])->name('rooms');
Route::post('/content.rooms',[RoomsController::class,'store'])->name('rooms.store');
Route::put('/content.rooms',[RoomsController::class,'edit'])->name('rooms.edit');
Route::delete('/content.rooms',[RoomsController::class,'destroy'])->name('rooms.destroy');
Route::get('/get-room-details/{id}', [RoomsController::class, 'getDetails']);

//offers
Route::get('/content.offers',[OffersController::class,'index'])->name('offers');
Route::post('/content.offers',[OffersController::class,'store'])->name('offers.store');
// Route::post('/content.offers',[OffersController::class,'resend'])->name('offers.resend');
//tickets
Route::get('/content.tickets',[TicketsController::class,'index'])->name('tickets');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
