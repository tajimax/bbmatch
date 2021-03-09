<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use App\UploadImage;
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
        $date = date('y-m-d');
        $item = User::where('id', $id)->first();
        $uploads = UploadImage::where('user_id', $id)->first();
        $position = Schedule::where('user_id', $id)->where('date', $date)->first();
        // $uploads = UploadImage::where()->first();
        return view('home.home', ['item'=>$item, 'image'=>$uploads, 'position'=>$position]);
    }
}
