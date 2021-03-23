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
        $item = User::where('id', $id)->first();
        $recruits = Recruit::where('user_id', $id)->get();
        
        $recruit_ids = $recruits->pluck('id');
        $applications = Message::whereNotIn('recruit_id', $recruit_ids)->where('send_user_id', $id)->groupBy('receive_user_id')->get();

        return view('home.home', ['item'=>$item, 'recruits'=>$recruits, 'applications'=>$applications]);
    }

    public function chat($recruit_id)  //応募してきているチームを表示
    {
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        $recruit = Recruit::where('id', $recruit_id)->first();

        $message_users = Message::where('recruit_id', $recruit_id)->where('receive_user_id', $id)->groupBy('send_user_id')->get();

        return view('home.chat', ['item'=>$item, 'recruit'=>$recruit, 'message_users'=>$message_users]);
    }

    public function message($recruit_id, $message_user_id)  //応募してきているチームとのメッセージを表示
    {
        $id = Auth::id();
        $recruit = Recruit::where('id', $recruit_id)->first();

        $messages = Message::where('send_user_id', $id)->orWhere('send_user_id', $message_user_id)->where('receive_user_id', $id)->orWhere('receive_user_id', $message_user_id)->get();

        return view('home.message', ['recruit'=>$recruit, 'messages'=>$messages, 'message_user_id'=>$message_user_id]);
    }

    // マイページ編集画面を表示
    public function showEdit(){
        $id = Auth::id();
        $item = User::where('id', $id)->first();
        $recruits = Recruit::where('user_id', $id)->get();

        $recruit_ids = $recruits->pluck('id');
        $applications = Message::whereNotIn('recruit_id', $recruit_ids)->where('send_user_id', $id)->groupBy('receive_user_id')->get();

        return view('home.edit', ['item' => $item, 'recruits' => $recruits, 'applications'=>$applications]);
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