<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use App\User;
use Auth;   

class RecruitController extends Controller
{
    // スケジュールの作成実行
    public function storeRecruit(Request $request){
        Recruit::create($request->all());
        return redirect(route('home'));
    }
    
    // 他のチームの詳細ページを表示
    public function showRecruit($recruit_id, $user_id){
        $recruit = Recruit::where('id', $recruit_id)->first();
        $recruits= Recruit::where('user_id', $user_id)->get();
        return view('search.user', ['recruit' => $recruit, 'recruits' => $recruits]);
    }
}
