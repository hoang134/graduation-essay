<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class CommentReply extends Model
{
    function comment()
    {
        return $this->belongsTo('App\Comment','comment_id','id');
    }

}
