<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\MessageRequest;
use App\Recruit;
use Auth;

class MessageController extends Controller
{
    public function sendMessage(MessageRequest $request) {
        Message::create($request->all());

        $id = Auth::id();
        $recruit_id = $request->recruit_id;
        $send_user_id = $request->send_user_id;
        $receive_user_id = $request->receive_user_id;
        $recruit = Recruit::find($recruit_id);
        
        Message::where('recruit_id', $recruit_id)->where('send_user_id', $id)->where('receive_user_id', $receive_user_id)->increment('unread_count',1);
        Message::where('recruit_id', $recruit_id)->where('send_user_id', $receive_user_id)->where('receive_user_id', $id)->increment('unread_apply',1);

        if($recruit['user_id'] != $send_user_id) {
            $recruit->increment('unread_count',1);
        }
        
        return redirect(route('home'));
    }
    
    public function replyMessage(MessageRequest $request) {
        Message::create($request->all());

        $id = Auth::id();
        $recruit_id = $request->recruit_id;
        $send_user_id = $request->send_user_id;
        $receive_user_id = $request->receive_user_id;
        $recruit = Recruit::find($recruit_id);

        Message::where('recruit_id', $recruit_id)->where('send_user_id', $id)->where('receive_user_id', $receive_user_id)->increment('unread_count',1);
        Message::where('recruit_id', $recruit_id)->where('send_user_id', $receive_user_id)->where('receive_user_id', $id)->increment('unread_apply',1);

        if($recruit['user_id'] != $send_user_id) {
            $recruit->increment('unread_count',1);
        }

        return redirect(route('message', ['recruit_id'=>$recruit_id ,'message_user_id'=>$receive_user_id ]));
    }
}