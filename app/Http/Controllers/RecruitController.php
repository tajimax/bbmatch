<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use App\User;
use Auth;   

class RecruitController extends Controller
{
    // スケジュールの作成実行
    public function exeRecruit(Request $request){
        Recruit::create($request->all());
        return redirect(route('home'));
    }
}
