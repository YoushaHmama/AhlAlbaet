<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteModel extends Model
{
    use HasFactory;
    protected $table = 'favorites';
    protected $fillable = [
        'user_id','post_id',
    ];
    public $timestamps = false;
}
