<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Schedule;
use App\Http\Requests\TeamReaquest;
use App\Http\Requests\Reaquest;
use Auth;

class BBmatchController extends Controller
{
    // チーム一覧画面を表示
    public function showList(){
        $items = Team::all();
        return view('search.list', ['items' => $items]);
    }

    // 他のチームの詳細ページを表示
    public function showUser(Request $request){
        $item = Team::find($request->id)->first();
        return view('search.user', ['item' => $item]);
    }

    // マイページの作成
    public function exeStore(TeamReaquest $request){
        Team::create($request->all());
        \Session::flash('err_msg', 'マイページの作成に成功しました。');
        return redirect(route('home'));
    }

    // マイページ編集画面を表示
    public function showEdit(){
        $user_id = Auth::id();
        $item = Team::where('user_id', $user_id)->first();
        return view('home.edit', ['item' => $item]);
    }

    // マイページの編集
    public function exeUpdate(TeamReaquest $request){
        $inputs = $request->all();
        $user_id = Auth::id();
        $item = Team::where('user_id', $user_id)->first();
        $item -> fill([
            'team' => $inputs['team'],
            'address' => $inputs['address'],
            'introduction' => $inputs['introduction'],
        ]);
        $item -> save();
        \Session::flash('err_msg', '編集しました。');
        return redirect(route('home'));
    }

    // スケジュールの作成
    public function exeSchedule(Request $request){
        Schedule::create($request->all());
        return redirect(route('home'));
    }

    // スケジュール検索
    public function exeSearchSchedule(Request $request){
        $user_id = Auth::id();
        $input = $request->all();
        $date = $input['date'];
        $item = Team::where('user_id', $user_id)->first();
        $position = Schedule::where('user_id', $user_id)->where('date', $date)->first();
        return view('/home/home', ['item'=>$item, 'position'=>$position]);
    }
}