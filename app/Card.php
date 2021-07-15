<?php

namespace App;

use App\Project;
use App\Task;
use App\Tag;


use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function task()
    {
        return $this->hasMany('App\Task');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}

