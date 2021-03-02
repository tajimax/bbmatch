<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use App\Http\Requests\TeamReaquest;
use App\Http\Requests\Reaquest;
use Auth;

class BBmatchController extends Controller
{
    // チーム一覧画面を表示
    public function showList(){
        $items = User::all();
        return view('search.list', ['items' => $items]);
    }

    // 他のチームの詳細ページを表示
    public function showUser(Request $request){
        $item = User::find($request->id)->first();
        return view('search.user', ['item' => $item]);
    }

    // マイページの作成
    public function exeStore(Reaquest $request){
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

    // スケジュールの作成
    public function exeSchedule(Request $request){
        Schedule::create($request->all());
        return redirect(route('home'));
    }

    // スケジュール検索
    public function exeSearchSchedule(Request $request){
        $id = Auth::id();
        $input = $request->all();
        $date = $input['date'];
        $item = User::where('id', $id)->first();
        $position = Schedule::where('id', $id)->where('date', $date)->first();
        return view('/home/home', ['item'=>$item, 'position'=>$position]);
    }
}