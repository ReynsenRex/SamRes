<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
  use HasFactory;

  protected $fillable = [
    'restaurant_id',
    'seat_number',
    'is_available',
  ];

  // Define the relationship to the Restaurant model
  public function restaurant()
  {
    return $this->belongsTo(Restaurant::class);
  }
  public function reservations()
  {
      return $this->belongsToMany(Reservation::class);
  }


}
