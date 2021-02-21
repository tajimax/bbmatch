<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BBmatchController extends Controller
{
    public function showList(){
        return view('search.list');
    }
}
