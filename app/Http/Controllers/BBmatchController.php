<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recruit;
use App\Http\Requests\Reaquest;
use Auth;

class BBmatchController extends Controller
{   
    // 他のチームの詳細ページを表示
    public function showUser(Request $request){
        $id = $request->id;
        $user_id = $request->user_id;
        $item = Recruit::where('id', $id)->first();
        $opponents= Recruit::where('user_id', $user_id)->get();
        return view('search.user', ['item' => $item, 'opponents' => $opponents]);
    }
}