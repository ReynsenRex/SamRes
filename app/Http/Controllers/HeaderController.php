<?php

namespace App\Http\Controllers;

class HeaderController extends Controller
{
    public function index()
    {
        $data = $this->setDefaultViewData('Menu');
        $data['showLogout'] = true;
        return view('home.index', $data);
    }

    public function pickcuisine()
    {
        $data = $this->setDefaultViewData('Pick a Cuisine');
        $data['showLogout'] = false;
        return view('pickcuisine', $data);
    }

    public function loyaltypoints()
    {
        $data = $this->setDefaultViewData('Loyalty');
        $data['showLogout'] = false;
        return view('loyaltypoints', $data);
    }

    public function restaurants()
    {
        $data = $this->setDefaultViewData('Select a Restaurant');
        $data['showLogout'] = false;
        return view('restaurants', $data);
    }
}
