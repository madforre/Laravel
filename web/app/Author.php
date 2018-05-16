<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;
    protected $fillable = ['email', 'password'];    
    
    // QueryException
    // save() 메소드 호출에서 예외가 발생했을 것이다. 엘로퀀트는 모든 모델이 updated_at과 created_at 필드가 있다고 가정하고, 
    // 새로운 Instance가 생성될 때 현재의 timestamp값을 입력하려한다. 그런데, 수작업으로 만든 테이블들은 앞서 말한 
    // 필드들이 존재하지 않는다. 방법은 필드를 추가하는 방법과, timestamp 입력을 모델에서 끄는 방법이 있는데, 실습을 위해 일단 끄자.
    
    // public $timestamps = false; 가 끈거임. Post 모델도 적용해주자.
}
