<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        'username','email','password',
        'photo','birthday',
    ];
    public $timestamps = false;
    
    public function post(){
       return $this->hasMany('App\Models\PostModel','user_id','id');
    }

    public function post_remove(){
        return $this->hasMany('App\Models\Post_RemoveModel','user_id','id');
     }

    public function favorite(){
        return $this->belongsToMany('App\Models\PostModel','favorites','user_id','post_id','id','id');
    }

    public function approve(){
        return $this->hasMany('App\Models\Post_ApproveModel','user_id','id');
    }

    public function notification(){
        return $this->hasMany('App\Models\User_NotificationModel','user_id','id');
    }
}
