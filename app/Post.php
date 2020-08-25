<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_posts', 'post_id', 'user_id');
    }

    public function lecturer()
    {
        return $this->users()->wherePivot('type', UserPost::TYPE_POST);
    }
}
