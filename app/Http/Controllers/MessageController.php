<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Recruit;

class MessageController extends Controller
{
    public function sendMessage(Request $request) {
        Message::create($request->all());
        $recruit_id = $request->recruit_id;
        Recruit::where('id', $recruit_id)->increment('msg_user_count',1);
        return redirect(route('home'));
    }
    
    public function replyMessage(Request $request) {
        Message::create($request->all());
        $message_user_id = $request->receive_user_id;
        $recruit_id = $request->recruit_id;

        return redirect(route('message', ['recruit_id'=>$recruit_id ,'message_user_id'=>$message_user_id ]));
    }
}

//平均年齢
//チームレベル
//過去の実績