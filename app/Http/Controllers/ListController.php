<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recruit;
use App\Http\Requests\Reaquest;
use Auth;

class ListController extends Controller
{
    // 当日のチーム一覧画面を表示
    public function showList(){
        $opponents = Recruit::searchByCategory('opponent')->get();
        $helpers = Recruit::searchByCategory('helper')->get();
        $auths = Auth::user();

        $weekday = ['日曜日' , '月曜日' , '火曜日' , '水曜日' , '木曜日' , '金曜日' , '土曜日'];

        return view('layouts.list_layout', ['opponents' => $opponents, 'helpers' => $helpers, 'auths' => $auths, 'weekday' => $weekday,]);
    }

    // チーム一覧画面を表示
    public function searchByAddressDate(Request $request){
        $address = $request->address;
        $date = $request->date;
        $auths = Auth::user();
        $weekday = ['日曜日' , '月曜日' , '火曜日' , '水曜日' , '木曜日' , '金曜日' , '土曜日'];

        if(isset($address) && empty($date)) {
            $opponents = Recruit::searchByCategory('opponent')->searchByAddress($address)->get();
            $helpers = Recruit::searchByCategory('helper')->searchByAddress($address)->get();
        }elseif(empty($address) && isset($date)){
            $opponents = Recruit::searchByCategory('opponent')->searchByDate($date)->get();
            $helpers = Recruit::searchByCategory('helper')->searchByDate($date)->get();
        }elseif(isset($address) && isset($date)){
            $opponents = Recruit::searchByCategory('opponent')->searchByAddress($address)->searchByDate($date)->get();
            $helpers = Recruit::searchByCategory('helper')->searchByAddress($address)->searchByDate($date)->get();
        }else{
            return redirect(route('show'));
        }

        return view('layouts.list_layout', ['opponents' => $opponents, 'helpers' => $helpers, 'auths' => $auths, 'weekday' => $weekday,]);
    }
}