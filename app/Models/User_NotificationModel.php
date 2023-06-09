<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_NotificationModel extends Model
{
    use HasFactory;
    protected $table = 'user_notification';
    protected $fillable = [
        'user_id','post_id','agree','disagree','reason',
    ];
    public $timestamps = false;

    public function post(){
        return $this->hasOne('App\Models\PostModel','post_id','id');
     }
}
