<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_ApproveModel extends Model
{
    use HasFactory;
    protected $table = 'posts_approved';
    protected $fillable = [
        'user_id','post_id',
    ];
    public $timestamps = false;

    // public function user(){
    //     return $this->hasOne('App\Models\UserModel','id','user_id');
    // }
}
