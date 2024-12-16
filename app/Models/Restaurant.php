<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // Table name (optional if it matches convention)
    protected $table = 'restaurants';

    // Fields that are mass assignable
    protected $fillable = [
        'name',
        'category_id',
        'rating',
        'price',
        'location',
        'image',
    ];

    // Define the relationship between Restaurant and Category
    public function category()
    {
        return $this->belongsTo(Category::class);
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
}
