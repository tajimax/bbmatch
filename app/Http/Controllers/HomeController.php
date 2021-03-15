<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recruit;
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
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        $recruits = Recruit::where('user_id', $id)->get();
        return view('home.home', ['item'=>$item, 'recruits'=>$recruits]);
    }
}