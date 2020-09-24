<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
//    use SoftDeletes;
    const ROLE_SUPER_ADMIN = "SUADMIN";
    const ROLE_ADMIN = "ADMIN";
    const ROLE_USER = "USER";
    const GENDER_MALE = "Nam";
    const  GENDER_FEMALE = "Nữ";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','gender','code','class','birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function comments()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'user_posts', 'user_id', 'post_id')->withTimestamps();
    }

    public function messengers()
    {
        return $this->hasMany('App\Messenger','user_id','id');
    }

    public function reports()
    {
        return $this->hasMany('App\Report','user_id','id');
    }

}
