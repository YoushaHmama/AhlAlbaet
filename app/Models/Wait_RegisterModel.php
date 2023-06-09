<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wait_RegisterModel extends Model
{
    use HasFactory;
    protected $table = "register_wait";
    protected $fillable = [
        'username','email','password',
        'photo','birthday',
    ];
    public $timestamps = false;
}
