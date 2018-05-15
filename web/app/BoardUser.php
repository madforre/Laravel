<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardUser extends Model
{
    protected $table = 'users';
    protected $fillable = ['id', 'email', 'password', 'name'];
    protected $hidden = ['password'];
    //
}
