<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Recruit;

class Message extends Model
{
    protected $table = 'messages';
    
    protected $fillable = ['recruit_id' ,'send_user_id', 'receive_user_id', 'text',];

    public function sendUser() {
        return $this->belongsTo('App\User', 'send_user_id');
    }

    public function getSendName() {
        return $this->sendUser->name;
    }

    public function getAddress() {
        return $this->sendUser->address;
    }

    public function getImage() {
        return $this->sendUser->file_path;
    }

    public function receiveUser() {
        return $this->belongsTo('App\User', 'receive_user_id');
    }

    public function getReceiveName() {
        return $this->receiveUser->name;
    }

    public function recruit() {
        return $this->belongsTo('App\Recruit', 'recruit_id');
    }

    public function getCategory() {
        return $this->recruit->category;
    }

    public function getGameDay() {
        return $this->recruit->game_day;
    }

    public function getStartTime() {
        return $this->recruit->start_time;
    }

    public function getEndTime() {
        return $this->recruit->end_time;
    }

    public function getGamePlace() {
        return $this->recruit->game_place;
    }

    public function getUserID() {
        return $this->recruit->user_id;
    }
}