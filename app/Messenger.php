<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Messenger extends Model
{



    public function userTo()
    {
        return $this->belongsTo('App\User','user_id_to','id');
    }

    public function userFrom()
    {
        return $this->belongsTo('App\User','user_id_from','id');
    }
}
