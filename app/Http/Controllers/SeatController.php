<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
  /**
   * Display the seat selection page.
   */
  public function index()
  {
    // Set default view data
    $data = $this->setDefaultViewData('Select a seat');
    $data['showLogout'] = false;

    // Pass view data to the Blade template
    return view('seats.index', $data);
  }

  /**
   * Fetch all seats for the specified restaurant.
   */
  public function getSeats($restaurantId)
  {
    // Return seat data as JSON for the AJAX request
    $seats = Seat::where('restaurant_id', $restaurantId)->get();
    return response()->json($seats);
  }

  /**
   * Reserve selected seats.
   */
  public function reserveSeats(Request $request)
  {
    // Validate the incoming request
    $request->validate([
      'restaurant_id' => 'required|integer',
      'seats' => 'required|array',
    ]);

    // Update seat availability
    Seat::where('restaurant_id', $request->restaurant_id)
      ->whereIn('seat_number', $request->seats)
      ->update(['is_available' => false]);

    return response()->json(['message' => 'Seats reserved successfully']);
  }
}
