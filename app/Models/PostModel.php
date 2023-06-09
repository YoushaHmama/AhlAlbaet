<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'user_id','text','photo','favorites',
    ];
    public $timestamps = false;

    public function user(){
        return $this->hasOne('App\Models\UserModel','id','user_id');
    }

    public function favorite(){
        return $this->belongsToMany('App\Models\UserModel','favorites','post_id','user_id','id','id');
    }
}
