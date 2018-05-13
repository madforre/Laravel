<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function getTestPage()
    {
        return "test laravel";
    }

    public function authUser($id, $pass) { // 파라미터 전달 실습2
      if ($id === "reggie" && $pass === "031") {
        echo "로그인 성공";
      } else {
        echo "로그인 실패";
      }
    }

    public function getViewPage() // 뷰 실습
    {
        return view('test');
    }

    public function viewMessage($message) { // 데이터 전달 실습
        return view('test.message')->with('message', $message);
        // /views/test/message.php
        // test/message.php 구조는 . 즉 점으로 접근합니다.
        // 폴더가 더 많아진다면 점이 더 많아지겠죠
        // view('test.message');
    }
}
