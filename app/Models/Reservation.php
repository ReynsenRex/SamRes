<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional, if different from the default)
    protected $table = 'reservations';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'reservation_date',
        'reservation_time',
    ];

    // Define relationships
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function seats()
    {
        return $this->belongsToMany(Seat::class);
    }
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
