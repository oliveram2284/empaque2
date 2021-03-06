<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        return view('home');
        return view('pages.dashboard.alpha');
    }


    public function logout(){
        
        Auth::logout();
        return Redirect()->route('login');

    }
}

