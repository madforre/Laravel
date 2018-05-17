<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    public function index() {
        $greeting = '헬로우';
        return view('index')->with('greeting',$greeting); // index 메소드를 만들었다.
    }
    
    public function hou() {
   
//        $items = [
//        'Apple',
//        'Banana'
//        ];
        
        return view('index')->with([
            'greeting' => 'Good morning ^^/',
            'items' => ['Apple', 'Banana'] // 배열을 배열안에 넣어서 리턴
        ]);
    }
};
    
// 서버를 부트업하고, /경로로 접근하면 정상적으로 뷰가 표시된 것을 확인할 수 있다.