<?php

namespace App;

use App\Card;
use App\User;



use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function card()
    {
        return $this->hasMany('App\Card');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
