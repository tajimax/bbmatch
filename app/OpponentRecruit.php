<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class OpponentRecruit extends Model
{
    protected $table = 'opponent_recruits';

    protected $fillable = ['game_day', 'user_id', 'start_time', 'end_time', 'game_place', 'note',];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getImage() {
        return $this->user->file_path;
    }
    public function getName() {
        return $this->user->name;
    }

    public function getAddress() {
        return $this->user->address;
    }

    public function getIntro() {
        return $this->user->introduction;
    }

    public function scopeSearchOpponentByAddress($query, $str) {
        $opponent_user = User::where('address', $str)->first();
        $opponent_user_id = $opponent_user['id'];
        return $query -> where('user_id', '=', $opponent_user_id);
    }

    public function scopeSearchOpponentByDate($query, $str) {
        return $query -> where('game_day', '=', $str);
    }
}
