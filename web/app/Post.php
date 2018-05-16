<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'body'];
    // MassAssignmentException
    // timestamps를 무력화 시킨 후에도, create() 메소드를 이용할 때는 에러가 발생했다. 
    // create() 메소드로 모델 인스턴스를 생성할 때는 해당 모델에 $fillable 속성을 지정해 주어야 한다. 
    // 폼을 통해 사용자가 넘긴 값을 그대로 DB에 넣을 경우를 대비해, 악의적인 필드가 입력되는 것을 방지하기 위한 조치이다. 
    // Post와 Author 모델을 열고 $fillable 속성을 지정하자.
}
