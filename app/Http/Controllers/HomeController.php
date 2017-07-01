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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // No need for user null check, because we only
        //   hit this route if authenticated.
        $user  = $request->user();
        $meals = $user->meals()
            ->get();
        return view('home', compact('user', 'meals'));
    }
}
