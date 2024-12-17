<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Restaurant;

class SeatSeeder extends Seeder
{
    public function run()
    {
        $restaurants = Restaurant::all(); // Fetch all restaurants

        foreach ($restaurants as $restaurant) {
            // Generate seats for each restaurant, assuming 10 seats per restaurant
            for ($i = 1; $i <= 10; $i++) { // Modify the number of seats as needed
                Seat::create([
                    'restaurant_id' => $restaurant->id,
                    'seat_number' => 'Seat ' . $i, // Automatically assign seat numbers
                    'is_available' => true, // You can adjust this based on availability
                ]);
            }
        }
    }
}
