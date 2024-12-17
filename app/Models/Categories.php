<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    // Define the relationship between Category and Restaurant
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
