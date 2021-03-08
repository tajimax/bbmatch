<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use App\UploadImage;
use App\Http\Requests\Reaquest;
use Auth;

class ListController extends Controller
{
    // 当日のチーム一覧画面を表示
    public function showList(){
        $date = date('y-m-d');
        $items = Schedule::where('date', '>=', $date)->get();
        return view('search.list', ['items' => $items]);
    }

    // 人数でチーム一覧画面を表示
    public function showMember(Request $request){
        $member = $request->member;
        $items = Schedule::where('member', '>=', $member)->get();
        return view('search.list', ['items' => $items]);
    }

    // 日付でチーム一覧画面を表示
    public function showDate(Request $request){
        $date = $request->date;
        $items = Schedule::where('date', '>=', $date)->get();
        return view('search.list', ['items' => $items]);
    }
}