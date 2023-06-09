<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_RemoveModel extends Model
{
    use HasFactory;
    protected $table = 'posts_removed';
    protected $fillable = [
        'user_id','post_id','text','photo',
    ];
    public $timestamps = false;
}
