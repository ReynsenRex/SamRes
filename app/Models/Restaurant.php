<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'rating', 'price', 'image_url'];

    // Define the relationship between Restaurant and Category
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    // You can define other relationships if needed, e.g., a restaurant has many reviews
    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }

    // You may also define any accessors or mutators, for example, for the image URL
    public function getImageUrlAttribute()
    {
        return asset('images/restaurants/' . $this->image);
    }
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
