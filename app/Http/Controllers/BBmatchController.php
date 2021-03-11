<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Reaquest;
use Auth;

class BBmatchController extends Controller
{   
    // 他のチームの詳細ページを表示
    public function showUser(Request $request){
        $user_id = $request->id;
        $date = $request->date;
        $item = Schedule::where('user_id', $user_id)->where('date', $date)->first();
        $uploads = UploadImage::where('user_id', $user_id)->first();
        return view('search.user', ['item' => $item, 'image'=>$uploads]);
    }

    // マイページ編集画面を表示
    public function showEdit(){
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        return view('home.edit', ['item' => $item,]);
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

        $upload_image = $request->file('image');
        if($upload_image) {
            $path = $upload_image->store('public/uploads');
            //画像の保存に成功したらDBに記録する
            if($path){
                $item -> fill([
                    'file_name' => $upload_image->getClientOriginalName(),
                    'file_path' => $path
                ]);
            }
        }
        $item -> save();
        \Session::flash('err_msg', '編集しました。');
        return redirect(route('home'));
    }

    // スケジュールの作成画面を表示
    public function editSchedule(){
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        $uploads = UploadImage::orderBy("id", "desc")->first();
        return view('home.schedule', ['item'=>$item, 'image'=>$uploads]);
    }

    // スケジュールの作成実行
    public function exeSchedule(ScheduleRequest $request){
        Schedule::create($request->all());
        return redirect(route('home'));
    }

    // スケジュールの作成実行
    public function exeSearchSchedule(Request $request){
        $id = Auth::id();
        $date = $request->date;
        $item = User::where('id', $id)->first();
        $uploads = UploadImage::where('user_id', $id)->first();
        $position = Schedule::where('user_id', $id)->where('date', $date)->first();
        return view('/home/home', ['item'=>$item, 'image'=>$uploads, 'position'=>$position]);
    }
}