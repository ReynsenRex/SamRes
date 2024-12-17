<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeatSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $now = Carbon::now();

    Seat::insert([
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 1,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 2,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 3,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 4,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 5,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 6,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 7,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 8,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 9,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'restaurant_id' => 1, // Bu Rudy
        'seat_number' => 10,
        'is_available' => true,
        'created_at' => $now,
        'updated_at' => $now,
      ],
    ]);
  }
}
