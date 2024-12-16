<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;

class RestaurantController extends Controller
{
    // Display all restaurants
    public function index()
    {
        // Set dynamic title and shared data for the view
        $data = $this->setDefaultViewData('Select a Restaurant');
        $data['showLogout'] = false;

        // Fetch all restaurants
        $restaurants = Restaurant::with('category')->get()->map(function ($restaurant) {
            return [
                'id' => $restaurant->id,
                'name' => $restaurant->name,
                'category' => $restaurant->category->name,
                'rating' => $restaurant->rating,
                'price' => $restaurant->price,
                'image_url' => asset('images/restaurants/' . $restaurant->image),
            ];
        });

        // Pass the categories and restaurants to the view
        $data['restaurants'] = $restaurants;
        return view('restaurants', $data);
    }

    public function showRestaurantsByCategory($categoryId)
    {
        // Fetch the selected category
        $selectedCategory = Category::findOrFail($categoryId);

        // Set dynamic title for this category page
        $data = $this->setDefaultViewData('Restaurants by Category: ' . $selectedCategory->name);
        $data['showLogout'] = false;

        // Fetch the restaurants of the selected category
        $restaurants = Restaurant::where('category_id', $categoryId)->get();

        // Pass the category and the restaurants to the view
        $data['selectedCategory'] = $selectedCategory;
        $data['restaurants'] = $restaurants;
        return view('restaurants', $data);
    }

    /**
     * Set shared view data for all restaurant-related views.
     *
     * @param string $title The title to be set dynamically.
     * @return array An associative array containing the title and categories data.
     */
    protected function setDefaultViewData($title): array
    {
        return [
            'title' => $title, // Set the dynamic title
            'categories' => Category::all(), // Get all categories to be shared in the view
        ];
    }
}