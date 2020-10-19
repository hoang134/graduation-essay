<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicReport extends Model
{
    public function post()
    {
       return $this->belongsTo('App\Post','post_id','id');
    }

    public function reports()
    {
        return $this->hasMany('App\Report','topic_report_id','id');
    }
}
