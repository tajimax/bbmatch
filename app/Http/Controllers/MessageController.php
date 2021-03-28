<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\MessageRequest;
use App\Recruit;
use Auth;

class MessageController extends Controller
{
    public function replyMessage(MessageRequest $request) {
        Message::create($request->all());

        $id = Auth::id();
        $recruit_id = $request->recruit_id;
        $send_user_id = $request->send_user_id;
        $receive_user_id = $request->receive_user_id;
        $recruit_user = Recruit::find($recruit_id);
        
        Message::where('send_user_id', $id)->where('receive_user_id', $receive_user_id)->increment('unread_count',1);
        Message::where('send_user_id', $receive_user_id)->where('receive_user_id', $id)->increment('unread_apply',1);

        if($recruit_user != $send_user_id) {
            $recruit_user->increment('unread_count',1);
        }
        $recruit_id = $request->recruit_id;
        
        return redirect(route('home'));
    }
}