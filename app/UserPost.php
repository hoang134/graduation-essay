<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class UserPost extends Model
{
    public function reports()
    {
        return $this->hasMany('App\Report','user_post_id','id');
    }

    const TYPE_POST = "POST";
    const TYPE_REGISTER = "REGISTER";
}
