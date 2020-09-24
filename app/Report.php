<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Report extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','report_id','id');
    }

    public function topicReport()
    {
        return $this->belongsTo('App/TopicReport','topic_report_id','id');
    }

}
