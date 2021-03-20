<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Recruit extends Model
{    
    protected $table = 'recruits';
    
    protected $fillable = ['category', 'game_day', 'user_id', 'start_time', 'end_time', 'game_place', 'note',];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getName() {
        return $this->user->name;
    }

    public function getIntro() {
        return $this->user->introduction;
    }

    public function getAddress() {
        return $this->user->address;
    }

    public function getImage() {
        return $this->user->file_path;
    }

    public function scopeSearchByCategory($query, $str) {
        return $query -> where('category', '=', $str);
    }

    public function scopeSearchByAddress($query, $str) {
        $users = User::where('address', $str)->get(); //検索した住所に該当する全ユーザーを取得

        if(isset($users)){
            $user_ids = $users->pluck('id'); //取得した全ユーザーのIDを配列で取得
        }else{
            $user_ids = [1];
        }
        return $query -> whereIn('user_id', $user_ids); //取得した全ユーザーのIDから全リクルートを表示
    }

    public function scopeSearchByDate($query, $str) {
        return $query -> where('game_day', '=', $str);
    }
}