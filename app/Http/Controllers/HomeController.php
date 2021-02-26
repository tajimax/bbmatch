<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;

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
        $user_id = Auth::id();
        $item = Team::where('user_id', $user_id)->first();
        return view('/home/home', ['item' => $item]);
    }
}
