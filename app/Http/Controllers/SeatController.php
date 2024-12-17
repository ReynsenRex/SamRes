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
    foreach ($request->seats as $index => $seatId) {
      $seat = Seat::find($seatId);
    }
    return $seat;
       // Validate the request
        $request->validate([
          'date' => 'required|date',
          'time' => 'required|string',
          'seats' => 'required|array',  // Array of selected seat numbers
          'seats.*' => 'exists:seats,seat_number',  // Ensure the seat_number exists in the seats table
      ]);

      $reservation = Reservation::create([
          'restaurant_id' => $restaurantId,
          'user_id' => Auth::id(),
          'seat_id' => 1,
          'reservation_date' => $request->date,
          'reservation_time' => $request->time,
      ]);
          // Attach selected seats to the reservation
      $seatData = [];
      foreach ($request->seats as $index => $seatId) {
          $seat = Seat::find($seatId);
          $seatData[] = [
              'seat_id' => $seat->id,  // Store seat_id
              'seat_number' => $request->seat_numbers[$index],  // Use the seat_number passed
              'created_at' => now(),
              'updated_at' => now(),
          ];
  
          // Mark the seat as unavailable
          $seat->is_available = false;
          $seat->save();
      }
  
      // Attach seats to the reservation using the pivot table
      $reservation->seats()->attach($seatData);
  
      // Return success message or redirect back
      return redirect()->route('home.index')->with('success', 'Reservation with seats successful!');
  }

}
