<?php

namespace App\Http\Controllers;

use App\Models\Categories;

use App\Models\Restaurant;

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

}
