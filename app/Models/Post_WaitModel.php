<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_WaitModel extends Model
{
    use HasFactory;
    protected $table = 'posts_wait';
    protected $fillable = [
        'user_id','text','photo',
    ];
    public $timestamps = false;

    public function user(){
        return $this->hasOne('App\Models\UserModel','id','user_id');
    }
}
