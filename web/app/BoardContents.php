<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardContents extends Model
{
    protected $table = 'contents';
    protected $fillable = ['id', 'title', 'reg_user_id', 'reg_user_name', 'view_count', 'updated_at', 'created_at'];
    protected $hidden = [];
    //
}
