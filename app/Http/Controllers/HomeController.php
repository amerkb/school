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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.selection');
    }
<<<<<<< HEAD
=======

>>>>>>> 9207fe03205b222139aa0e1b4dd6419b32c3636d
    public function dashboard()
    {
        return view('dashboard');
    }

}
