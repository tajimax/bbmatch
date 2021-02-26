<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Schedule;
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
        $date = '2021-03-01';
        $item = Team::where('user_id', $user_id)->first();
        $position = Schedule::where('user_id', $user_id)->where('date', $date)->first();
        return view('/home/home', ['item'=>$item, 'position'=>$position]);
    }
}
