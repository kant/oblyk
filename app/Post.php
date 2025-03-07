<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user(){
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function postable(){
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function likes(){
        return $this->morphMany('App\Like', 'likable');
    }
}