<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

abstract class Controller
{
    /**
     * Set shared view data.
     *
     * @param string $title
     * @return array
     */
    protected function setDefaultViewData(string $title): array
    {
        return [
            'title' => $title,
            'mainLogo' => asset('images/SamLogo.png'),
            'secondaryLogo' => asset('images/Logo2.png'),
            'logoutLink' => url('logout'),
        ];
    }
}
