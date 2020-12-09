<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class UserPost extends Model
{
    const TYPE_POST = "Tạo";
    const TYPE_REGISTER = "Đăng ký";

    const STATUS_QUALIFIED  = "Đạt";
    const STATUS_REGISTER_REQUEST  = "đề xuất đăng ký";
    const STATUS_REGISTER_FINISH  = "Hoàn thành đăng ký";
    const STATUS_REGISTER_ELIMINATED  = "Từ chối đăng ký";
    const STATUS_ELIMINATED = "Chưa đạt";
    const STATUS_REQUEST = "Đề xuất";
    const STATUS_FINISH = "Hoàn thành";




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
