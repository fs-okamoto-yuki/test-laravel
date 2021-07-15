<?php

namespace App;
use App\Card;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function card()
    {
        return $this->belongsTo('App\Card');
    }

}
