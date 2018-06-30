<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() // because many users
    {
        return $this->belongsToMany(User::class, 'role_user','role_id', 'user_id')->withTimeStamps(); // set up the relation
    }
}
