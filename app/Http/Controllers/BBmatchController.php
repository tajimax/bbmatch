<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\Reaquest;
use Auth;

class BBmatchController extends Controller
{   
    // 他のチームの詳細ページを表示
    public function showUser(Request $request){
        $user_id = $request->id;
        $date = $request->date;
        $item = Schedule::where('user_id', $user_id)->where('date', $date)->first();
        return view('search.user', ['item' => $item]);
    }

    // マイページの作成
    public function exeStore(Request $request){
        User::create($request->all());
        \Session::flash('err_msg', 'マイページの作成に成功しました。');
        return redirect(route('home'));
    }

    // マイページ編集画面を表示
    public function showEdit(){
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        return view('home.edit', ['item' => $item]);
    }

    // マイページの編集
    public function exeUpdate(Request $request){
        $inputs = $request->all();
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        $item -> fill([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'introduction' => $inputs['introduction'],
        ]);
        $item -> save();
        \Session::flash('err_msg', '編集しました。');
        return redirect(route('home'));
    }

    // スケジュールの作成画面を表示
    public function editSchedule(){
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        return view('home.schedule', ['item'=>$item]);
    }

    // スケジュールの作成実行
    public function exeSchedule(ScheduleRequest $request){
        Schedule::create($request->all());
        return redirect(route('home'));
    }
}