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

    public function scopeDivideByCategory($query, $str) {
        return $query -> where('category', '=', $str);
    }

    public function scopeSearchByAddress($query, $str) {
        $user = User::where('address', $str)->first();
        $user_id = $user['id'];
        return $query -> where('user_id', '=', $user_id);
    }

    public function scopeSearchByDate($query, $str) {
        return $query -> where('game_day', '=', $str);
    }
}