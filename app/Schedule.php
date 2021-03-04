<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = ['user_id', 'name', 'address', 'date', 'P', 'C', 'FB', 'SB', 'TB', 'SS', 'LF', 'CF', 'RF', 'member',];
}
