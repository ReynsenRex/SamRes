<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Restaurant;
use App\Models\Seat;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
  // Function to show all cuisines
  public function index()
  {
    // Set default navbar data
    $data = $this->setDefaultViewData('Pick a Cuisine');
    $data['showLogout'] = false;

    // Fetch all categories
    $data['categories'] = Categories::all();

    // Return view with categories
    return view('pickcuisine', $data);
  }

  public function pickcuisine()
  {
    // Fetch all categories (cuisines) from the database
    $categories = Categories::all();

    // Pass categories to the view
    $data = $this->setDefaultViewData('Pick a Cuisine');
    $data['showLogout'] = false;
    $data['categories'] = $categories;

    return view('restaurants.pickcuisine', $data);
  }

  // Function to show restaurants based on category
  public function showRestaurantsByCategory($categoryId)
  {
    // Set default navbar data
    $data = $this->setDefaultViewData('Select a Restaurant');
    $data['showLogout'] = false;

    // Fetch selected category
    $data['category'] = Categories::findOrFail($categoryId);

    // Fetch restaurants under the selected category
    $data['restaurants'] = Restaurant::where('category_id', $categoryId)->get();

    // Return view with restaurants
    return view('restaurants.list', $data);
  }

  // Function to show reservation form
  public function reserve($id, Request $request)
  {
      $data = $this->setDefaultViewData('Select date and time');
      $data['showLogout'] = false;
      $restaurant = Restaurant::findOrFail($id);
      $date = $request->input('date');
      $time = $request->input('time');
  
      $seats = Seat::where('restaurant_id', $id)
          ->where('is_available', true)
          ->whereNotIn('id', function ($query) use ($date, $time) {
              $query->select('seat_id')
                    ->from('reservations')
                    ->where('reservation_date', $date)
                    ->where('reservation_time', $time);
          })
          ->get();
  
      return view('restaurants.reserve', compact('restaurant', 'seats', 'date', 'time'))->with($data);
  }
  



  // Function to store reservation
  public function selectSeat($restaurant_id, Request $request)
  {
      // Find the restaurant by its ID
      $restaurant = Restaurant::findOrFail($restaurant_id);

      $data = $this->setDefaultViewData('Select a Seat');
    $data['showLogout'] = false;
  
      // Fetch available seats for this restaurant
      // Assuming the restaurant has a relationship to seats
      $seats = $restaurant->seats()->where('is_available', true)->get();
  
      // Return the seat selection view with the seats data
      return view('seats.index', compact('restaurant', 'seats'))->with($data);
  }
  public function storeReservation(Request $request)
  {
      // Set default view data
      $data = $this->setDefaultViewData('Select date and time');
      $data['showLogout'] = false;
  
      // Validate the request
      $request->validate([
          'date' => ['required', 'date', 'after_or_equal:2024-12-19', 'before_or_equal:2024-12-20'], // Ensure date is within range
          'time' => ['required', 'in:12:30,14:00,15:00,17:30'], // Only valid times
          'restaurant_id' => 'required|exists:restaurants,id',
      ]);
  

      // Store the reservation with the seat_id
      $reservation = Reservation::create([
          'restaurant_id' => $request->restaurant_id,
          'user_id' => Auth::id(), // Get authenticated user ID
          'reservation_date' => $request->date,
          'reservation_time' => $request->time,
      ]);
  
      // Redirect to the dynamic seat selection page
      return redirect()->route('seats.index', [
          'reservation_id' => $reservation->id, // Pass the reservation ID or other parameters
          'restaurant_id' => $request->restaurant_id,
          'date' => $request->date,
          'time' => $request->time,
      ])->with('success', 'Reservation successful!');
      dd($reservation->id, $request->restaurant_id, $seat->seat_number, $seat->id, $request->date, $request->time);

  }
  
public function getSeats($restaurantId)
{
    // Fetch available seats for this restaurant and include seat_id
    $seats = Seat::where('restaurant_id', $restaurantId)
                 ->where('is_available', true)
                 ->get(['seat_number']);  // Ensure seat_id is included

    // Return seat data as JSON
    return response()->json($seats);
}
    // // Reserve seats
    // public function reserveSeats(Request $request)
    // {
    //     // Validate the incoming request data
    //     $request->validate([
    //         'restaurant_id' => 'required|exists:restaurants,id',
    //         'seats' => 'required|array',
    //         'seats.*' => 'exists:seats,seat_number',  // Validate seat_number
    //     ]);
    
    //     // Find the restaurant by ID
    //     $restaurant = Restaurant::findOrFail($request->restaurant_id);
    
    //     // Mark the selected seats as reserved by their seat_number
    //     Seat::whereIn('seat_number', $request->seats)->update(['is_available' => false]);
    
    //     // Fetch updated seat status to send back to the front-end
    //     $updatedSeats = Seat::whereIn('seat_number', $request->seats)->get();
    
    //     // Return updated seat data as JSON
    //     return response()->json([
    //         'message' => 'Seats reserved successfully!',
    //         'updatedSeats' => $updatedSeats,  // Send the updated seats to the front-end
    //         'success' => true,
    //     ]);
    // }
    

    
}
