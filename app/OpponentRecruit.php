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
}
