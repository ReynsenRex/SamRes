<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\RestaurantController;




Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HeaderController::class, 'index']);

Route::get('/pickcuisine', [HeaderController::class, 'pickcuisine']);

Route::get('/loyaltypoints', [HeaderController::class, 'loyaltypoints']);


Route::get('/pick-cuisine', [HeaderController::class, 'pickcuisine'])->name('pickcuisine');

Route::get('/restaurants/category/{id}', [RestaurantController::class, 'showRestaurantsByCategory'])->name('restaurants.byCategory');

Route::get('/restaurants/{id}/reserve', [RestaurantController::class, 'reserve'])->name('restaurants.reserve');

Route::post('/restaurants/storeReservation', [RestaurantController::class, 'storeReservation'])->name('restaurants.storeReservation');
require __DIR__.'/auth.php';
