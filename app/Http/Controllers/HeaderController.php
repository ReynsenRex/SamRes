<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Restaurant;



class HeaderController extends Controller
{
    public function index()
    {
        $data = $this->setDefaultViewData('Menu');
        $data['showLogout'] = true;
        return view('home.index', $data);
    }

    
    public function loyaltypoints()
    {
        $data = $this->setDefaultViewData('Loyalty');
        $data['showLogout'] = false;
        return view('loyaltypoints', $data);
    }

    public function history()
    {
        $data = $this->setDefaultViewData('History');
        $data['showLogout'] = false;
        return view('history', $data);
    }
    
    public function restaurants()
    {
        // Fetch all restaurants and group them by category
        $restaurants = Restaurant::with('category')->get()->groupBy('category.name');

        return view('restaurants.list', [
            'restaurants' => $restaurants,
        ]);
    }
    
    public function pickcuisine()
    {
        // Fetch all categories (cuisines) from the database
        $categories = Categories::all();
    
        // Prepare shared view data
        $data = $this->setDefaultViewData('Pick a Cuisine');
        $data['showLogout'] = false;
        $data['categories'] = $categories;
    
        // Return the view with dynamic data
        return view('restaurants.pickcuisine', $data);
    }
}
