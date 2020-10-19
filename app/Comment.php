<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');

    }

    function report()
    {
        return $this->belongsTo('App\Report', 'report_id', 'id');

    }

    function commentReplys()
    {
        return $this->hasMany('App\CommentReply','comment_id','id');
    }
}


