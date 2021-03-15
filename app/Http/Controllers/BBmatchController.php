<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OpponentRecruit;
use App\Http\Requests\Reaquest;
use Auth;

class BBmatchController extends Controller
{   
    // 他のチームの詳細ページを表示
    public function showUser(Request $request){
        $id = $request->id;
        $user_id = $request->user_id;
        $item = OpponentRecruit::where('id', $id)->first();
        $opponents= OpponentRecruit::where('user_id', $user_id)->get();
        return view('search.user', ['item' => $item, 'opponents' => $opponents]);
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
}