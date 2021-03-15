<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OpponentRecruit;
use App\HelperRecruit;
use App\Http\Requests\Reaquest;
use Auth;

class ListController extends Controller
{
    // 当日のチーム一覧画面を表示
    public function showList(){
        $opponents = OpponentRecruit::all();
        $helpers = HelperRecruit::all();
        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }

    // 人数でチーム一覧画面を表示
    public function searchByAddress(Request $request){
        $address = $request->address;
        $opponents = OpponentRecruit::searchOpponentByAddress($address)->get();
        $helpers = HelperRecruit::searchHelperByAddress($address)->get();
        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }

    // 日付でチーム一覧画面を表示
    public function searchByDate(Request $request){
        $date = $request->date;
        $opponents = OpponentRecruit::searchOpponentByDate($date)->get();
        $helpers = HelperRecruit::searchHelperByDate($date)->get();
        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }

    // 人数でチーム一覧画面を表示
    public function searchByAddressDate(Request $request){
        $address = $request->address;
        $date = $request->date;
        $opponents = OpponentRecruit::searchOpponentByAddress($address)->searchOpponentByDate($date)->get();
        $helpers = HelperRecruit::searchHelperByAddress($address)->searchHelperByDate($date)->get();
        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }
}