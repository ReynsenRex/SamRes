<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    // $data = $this->setDefaultViewData('Menu');
    // $data['showLogout'] = true;
    return view('login');
  }

  public function authenticate(Request $request)
  {
    $credemtials = $request->validate([
      'email' => 'required|email:dns',
      'password' => 'required',
    ]);

    if (Auth::attempt($credemtials)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }

    return back()->with('loginError', 'Email atau password salah!');
  }

  public function signout(Request $request) {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->intended('/signin');
  }
}
