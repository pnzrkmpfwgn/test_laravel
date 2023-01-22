<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if logged in user is admin, redirect to admin dashboard
        if(auth()->user()->is_admin == 1) {
          return redirect()->to('auth/dashboard');
        }
        // if logged in user is not admin, redirect to 'home' (user dashboard)
        return view('home');
    }
    public function sell()
    {
        // if logged in user is admin, redirect to admin dashboard
        if(auth()->user()->is_admin == 2) {
          return redirect()->to('auth/seller');
        }
        // if logged in user is not admin, redirect to 'home' (user dashboard)
        return view('home');
    }
}
