<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use App\Http\Requests\RecruitRequest;
use App\Message;
use App\User;
use Auth;   

class RecruitController extends Controller
{
    // スケジュールの作成実行
    public function storeRecruit(RecruitRequest $request){
        Recruit::create($request->all());
        return redirect(route('home'));
    }
    
    // 他のチームの詳細ページを表示
    public function showRecruit($recruit_id){
        $recruit = Recruit::where('id', $recruit_id)->first();
        $profile = [
            'id' => $recruit->getUserID(),
            'file_path' => $recruit->getImage(),
            'name' => $recruit->getName(),
            'address' => $recruit->getAddress(),
            'introduction' => $recruit->getIntro(),
        ];
        return view('layouts.recruit_layout', ['recruit' => $recruit, 'profile' => $profile,]);
    }
    
    // 投稿中の募集を削除
    public function delete_recruit(Request $request){
        $recruit_id = $request->recruit_id;
        Recruit::find($recruit_id)->delete();
        Message::where('recruit_id', $recruit_id)->delete();
        
        return redirect(route('home'));
    }
    
    // 投稿中の募集を編集
    public function edit_recruit(Request $request){
        $recruit_id = $request->recruit_id;
        $recruit = Recruit::find($recruit_id);
    
        $recruit -> fill([
            'category' => $request->category,
            'game_day' => $request->game_day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'game_place' => $request->game_place,
            'note' => $request->note,
        ]);
        $recruit -> save();
        
        return redirect(route('home'));
    }
    
    // 新規投稿フォームを表示
    public function postRecruit(){
        $auths = Auth::user();
        return view('post_form', ['auths' => $auths]);
    }
}
