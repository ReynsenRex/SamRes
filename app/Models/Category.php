<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the relationship between Category and Restaurant
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
