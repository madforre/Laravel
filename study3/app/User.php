<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // 모델간 관계를 연결했다.
    // >> User has many Post. Post belongs to a User. <<

    // 인증 모델은 모델을 확장하므로 자동으로 확장하는 
    public function posts() 
    {
        return $this->hasMany('App\Post'); 
        // 여러 개의 app\post를 가질 수 있다는 뜻
    }
};

// class User extends Model
// {
    

// };