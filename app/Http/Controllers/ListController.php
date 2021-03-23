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
        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers, 'auths' => $auths]);
    }

    // チーム一覧画面を表示
    public function searchByAddressDate(Request $request){
        $address = $request->address;
        $date = $request->date;

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

        return view('search.list', ['opponents' => $opponents, 'helpers' => $helpers]);
    }
}