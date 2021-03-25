<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recruit;
use App\Message;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $profile = User::where('id', $id)->first();          //自分のプロフィール情報
        $recruits = Recruit::where('user_id', $id)->get();   //自分が投稿中の募集一覧
        
        $recruit_ids = $recruits->pluck('id');               //申請中の試合のID一覧
        $applys = Message::whereNotIn('recruit_id', $recruit_ids)->where('send_user_id', $id)->groupBy('receive_user_id')->get();   //申請中の試合一覧

        return view('layouts.home_layout', ['profile'=>$profile, 'recruits'=>$recruits, 'applys'=>$applys]);
    }

    public function chat($recruit_id)  //応募してきているチームを表示
    {
        $id = Auth::id();
        $profile = User::where('id', $id)->first();                //自分のプロフィール情報
        $recruit = Recruit::where('id', $recruit_id)->first();     //該当する試合の詳細情報

        $message_users = Message::where('recruit_id', $recruit_id)->where('receive_user_id', $id)->groupBy('send_user_id')->get();   //該当する試合に応募してきているチーム

        return view('layouts.chat_layout', ['profile'=>$profile, 'recruit'=>$recruit, 'message_users'=>$message_users]);
    }

    public function message($recruit_id, $message_user_id)  //応募してきているチームとのトーク画面を表示
    {
        $id = Auth::id();
        $recruit = Recruit::where('id', $recruit_id)->first();
        $profile = [
            'file_path' => $recruit->getImage(),
            'name' => $recruit->getName(),
            'address' => $recruit->getAddress(),
            'introduction' => $recruit->getIntro(),
        ];

        $message_user = User::find($message_user_id);
        $messages = Message::where('send_user_id', $id)->orWhere('send_user_id', $message_user_id)->where('receive_user_id', $id)->orWhere('receive_user_id', $message_user_id)->get();

        $receive_messages = Message::where('send_user_id', $message_user_id)->where('receive_user_id', $id)->get();
        foreach($receive_messages as $receive_message){
            $receive_message -> fill([
                'unread_count' => 0,
            ]);
            $receive_message -> save();
        }
        
        $send_messages = Message::where('send_user_id', $id)->where('receive_user_id', $message_user_id)->get();
        foreach($send_messages as $send_message){
            $send_message -> fill([
                'unread_apply' => 0,
            ]);
            $send_message -> save();
        }

        return view('layouts.message_layout', ['profile'=>$message_user, 'recruit'=>$recruit, 'messages'=>$messages, 'message_user_id'=>$message_user_id]);
    }

    // マイページ編集画面を表示
    public function showEdit(){
        $id = Auth::id();
        $profile = User::where('id', $id)->first();
        $recruits = Recruit::where('user_id', $id)->get();

        $recruit_ids = $recruits->pluck('id');
        $applys = Message::whereNotIn('recruit_id', $recruit_ids)->where('send_user_id', $id)->groupBy('receive_user_id')->get();

        return view('layouts.edit_layout', ['profile' => $profile, 'recruits' => $recruits, 'applys'=>$applys]);
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