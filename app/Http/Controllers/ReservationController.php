<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Reservation; // Make sure you have a Reservation model
use App\Models\Seat;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
public function history()
{
    $data = $this->setDefaultViewData('History');
    $data['showLogout'] = false;
    // Fetch all reservations from the database
    $reservations = Reservation::with('seat', 'restaurant') // Assuming relationships exist
        ->orderBy('reservation_date', 'desc') // Sort by date
        ->get();

    // Pass the data to the Blade view
    return view('history', compact('reservations'))->with($data);
}

public function cancel($id)
{
    $reservation = Reservation::findOrFail($id);

    // Release the reserved seat
    if ($reservation->seat) {
        $reservation->seat->update(['is_available' => true]);
    }

    // Mark the reservation as cancelled
    $reservation->status = 'Cancelled';
    $reservation->save();

    return redirect()->route('history')->with('success', 'Reservation has been cancelled, and the seat is now available.');
}


}