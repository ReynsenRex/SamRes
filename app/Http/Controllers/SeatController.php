<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
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
      // Fetch the seats for the specified restaurant
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
  
  public function storeSeats(Request $request, $restaurantId)
{
    // Validate the request
    $request->validate([
        'date' => 'required|date',
        'time' => 'required|string',
        'seats' => 'required|array',
        'seats.*' => 'exists:seats,id',  // Ensure selected seats exist in the database
    ]);

    // Store the reservation with selected seats
    $reservation = Reservation::create([
        'restaurant_id' => $restaurantId,
        'user_id' => Auth::id(),
        'reservation_date' => $request->date,
        'reservation_time' => $request->time,
    ]);

    // Attach selected seats to the reservation
    $reservation->seats()->attach($request->seats);

    // Mark the selected seats as reserved
    foreach ($request->seats as $seatId) {
        $seat = Seat::find($seatId);
        $seat->is_available = false;
        $seat->save();
    }

    // Redirect back with a success message
    return redirect()->route('restaurants.index')->with('success', 'Reservation with seats successful!');
}

}
