<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\RestaurantController;
use App\Models\Category;
use App\Models\Restaurant;




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

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants');
Route::get('/restaurants/category/{categoryId}', [RestaurantController::class, 'showRestaurantsByCategory'])->name('restaurants.byCategory');



require __DIR__.'/auth.php';
