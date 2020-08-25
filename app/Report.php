<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Report extends Model
{
    function userPost()
    {
        return $this->belongsTo('App\UserPost','user_port_id','id');
    }

}
