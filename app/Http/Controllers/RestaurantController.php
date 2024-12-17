<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Restaurant;
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
  public function reserve($id)
  {
    $data = $this->setDefaultViewData('Select date and time');
    $data['showLogout'] = false;

    $restaurant = Restaurant::findOrFail($id);

    // Return reservation form view
    return view('restaurants.reserve', compact('restaurant'))->with($data);
  }

  // Function to store reservation
  public function storeReservation(Request $request)
  {
    // Set default view data
    $data = $this->setDefaultViewData('Select date and time');
    $data['showLogout'] = false;

    // Validate the request
    $request->validate([
      'date' => 'required|date',
      'time' => 'required|date_format:H:i',
      'restaurant_id' => 'required|exists:restaurants,id', // Ensure restaurant_id is valid
    ]);

    // Store the reservation
    Reservation::create([
      'restaurant_id' => $request->restaurant_id,
      'user_id' => Auth::id(), // Use Auth::id() to get the authenticated user's ID
      'reservation_date' => $request->date,
      'reservation_time' => $request->time,
    ]);

    // Redirect with success message, including the default data
    return redirect()->to('restaurants.index')->with('success', 'Reservation successful!')->with($data);
  }
}
