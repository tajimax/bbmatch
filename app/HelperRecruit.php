<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HelperRecruit extends Model
{    
    protected $table = 'helper_recruits';
    
    protected $fillable = ['game_day', 'user_id', 'start_time', 'end_time', 'game_place', 'note',];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getName() {
        return $this->user->name;
    }

    public function getAddress() {
        return $this->user->address;
    }

    public function getImage() {
        return $this->user->file_path;
    }

    public function scopeSearchHelperByAddress($query, $str) {
        $helper_user = User::where('address', $str)->first();
        $helper_user_id = $helper_user['id'];
        return $query -> where('user_id', '=', $helper_user_id);
    }

    public function scopeSearchHelperByDate($query, $str) {
        return $query -> where('game_day', '=', $str);
    }
}