<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BBmatchController extends Controller
{
    public function showList(){
        $items = User::all();
        return view('search.list', ['items' => $items]);
    }

    public function showUser(Request $request){
        $item = User::WHERE('id', $request->id)->first();
        return view('search.user', ['item' => $item]);
    }
}
