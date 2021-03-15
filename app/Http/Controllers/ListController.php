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
        $opponents = Recruit::divideByCategory('opponent')->get();
        $helpers = Recruit::divideByCategory('helper')->get();
        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }

    // 所在地でチーム一覧画面を表示
    // public function searchByAddress(Request $request){
    //     $address = $request->address;
    //     $opponents = Recruit::divideByCategory('opponent')->searchByAddress($address)->get();
    //     $helpers = Recruit::divideByCategory('helper')->searchHelperByAddress($address)->get();
    //     return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    // }

    // // 日付でチーム一覧画面を表示
    // public function searchByDate(Request $request){
    //     $date = $request->date;
    //     $opponents = Recruit::divideByCategory('opponent')->searchByDate($date)->get();
    //     $helpers = Recruit::divideByCategory('helper')->searchByDate($date)->get();
    //     return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    // }

    // チーム一覧画面を表示
    public function searchByAddressDate(Request $request){
        $address = $request->address;
        $date = $request->date;

        if(isset($address) && empty($date)) {
            $opponents = Recruit::divideByCategory('opponent')->searchByAddress($address)->get();
            $helpers = Recruit::divideByCategory('helper')->searchByAddress($address)->get();
        }elseif(empty($address) && isset($date)){
            $opponents = Recruit::divideByCategory('opponent')->searchByDate($date)->get();
            $helpers = Recruit::divideByCategory('helper')->searchByDate($date)->get();
        }elseif(isset($address) && isset($date)){
            $opponents = Recruit::divideByCategory('opponent')->searchByAddress($address)->searchByDate($date)->get();
            $helpers = Recruit::divideByCategory('helper')->searchByAddress($address)->searchByDate($date)->get();
        }else{
            return redirect(route('show'));
        }

        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }
}