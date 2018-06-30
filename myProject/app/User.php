<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model; // 추가
use Illuminate\Database\Eloquent\Collection; //추가
use Illuminate\Database\Query\Builder; // 추가
use Illuminate\Support\Facades\Auth; // Auth 파사드 추가

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'status', 'activation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Relationships */

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'author_id');
    }

    public function roles()
    {
        // many to many relationships
        return $this->belongsToMany('App\Role', 'role_user','user_id', 'role_id')->withTimeStamps();
    }

    public function isAdmin()
    {   
        // where() all() get() App\user::roles pluck() 등등등.. 사용해서 해결하자.
        
        // 접속한 유저의 역할 이름을 뽑아서 컬렉션을 배열로 풀어준 뒤 배열의 첫번째
        // 인덱스의 값이 admin과 같다면 true를 리턴한다.
        $current_id=auth()->user()->id;
        return $this->find($current_id)->roles()->pluck('name')[0] == "admin";
    }  
}