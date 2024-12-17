<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;

use App\Models\Reservation;
use App\Models\Seat;

// Route::get('/', function () {
//   return Inertia::render('Welcome', [
//     'canLogin' => Route::has('login'),
//     'canRegister' => Route::has('register'),
//     'laravelVersion' => Application::VERSION,
//     'phpVersion' => PHP_VERSION,
//   ]);
// });

// Route::get('/dashboard', function () {
//   return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/signin', [LoginController::class, 'index']);
Route::post('/signin', [LoginController::class, 'authenticate']);
Route::post('/signout', [LoginController::class, 'signout']);

Route::get('/', [HeaderController::class, 'index']);

Route::get('/pickcuisine', [HeaderController::class, 'pickcuisine']);

Route::get('/loyaltypoints', [HeaderController::class, 'loyaltypoints']);

Route::get('/pick-cuisine', [HeaderController::class, 'pickcuisine'])->name('pickcuisine');

Route::get('/restaurants/category/{id}', [RestaurantController::class, 'showRestaurantsByCategory'])->name('restaurants.byCategory');

// Route to load the seat page
Route::get('/seats', [SeatController::class, 'index'])->name('seats.index');
// Route to fetch seat data (AJAX)
Route::get('/seats/{restaurantId}', [SeatController::class, 'getSeats']);

Route::post('/seats/reserve', [SeatController::class, 'reserveSeats']);

Route::get('/restaurants/{id}/reserve', [RestaurantController::class, 'reserve'])->name('restaurants.reserve');
// Define the route to select a seat
Route::get('/restaurants/{restaurant_id}/seats', [RestaurantController::class, 'selectSeat'])->name('seats.index');

Route::get('/seats/{restaurantId}', [RestaurantController::class, 'getSeats']);

Route::post('/seats/reserve', [RestaurantController::class, 'reserveSeats']);
// Define the route to show the reservation details
Route::get('/restaurants/reservation/{reservation_id}', [RestaurantController::class, 'showReservation'])->name('restaurants.showReservation');

Route::post('/restaurants/{restaurant}/reserve-seats', [RestaurantController::class, 'storeSeats'])->name('restaurants.storeSeats');

Route::post('/restaurants/storeReservation', [RestaurantController::class, 'storeReservation'])->name('restaurants.storeReservation');

Route::get('/seats/{restaurantId}', [SeatController::class, 'getSeats']);

Route::post('/seats/restore/{seatNumber}', [SeatController::class, 'restoreSeat']);
Route::post('/seats/reserve', [SeatController::class, 'reserveSeats']);

Route::get('/history', [ReservationController::class, 'history'])->name('history');
Route::delete('/reservation/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservation.cancel');


require __DIR__ . '/auth.php';
