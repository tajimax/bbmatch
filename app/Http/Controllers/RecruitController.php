<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OpponentRecruit;
use App\HelperRecruit;
use App\User;
use Auth;   

class RecruitController extends Controller
{
    // スケジュールの作成実行
    public function exeOpponentRecruit(Request $request){
        OpponentRecruit::create($request->all());
        return redirect(route('home'));
    }

    public function exeHelperRecruit(Request $request){
        HelperRecruit::create($request->all());
        return redirect(route('home'));
    }
}
