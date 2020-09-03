<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class UserPost extends Model
{
    const TYPE_POST = "POST";
    const TYPE_REGISTER = "REGISTER";

    public function reports()
    {
        return $this->hasMany('App\Report','user_post_id','id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public  function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
