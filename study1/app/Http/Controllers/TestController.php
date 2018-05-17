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

    public function sendData() { // 뷰 실습 2
        $data = array(
            "id1" => '첫번째 데이터',
            "id2" => '두번째 데이터',
            "id3" => '세번째 데이터'
        );

        return view('test.board', $data);
    }

    public function testRequest(Request $request) { // request 실습
        echo 'first_name 은 ' . $request->input('first_name');
        echo '<br />';
        echo 'last_name 은 ' . $request->input('last_name');
    }

    // 세션 실습

    public function storeSession(Request $request) {
        $request->session()->put('login', '로그인되어있음');
        echo "로그인 완료";
    }

    public function getSession(Request $request) {
        $value = $request->session()->get('login', '로그인되어있지않음');
        // login 변수가 없다면 ' 로그인되어있지않음 ' 을 출력한다.
        echo $value;
    }

    public function flushSession(Request $request) {
        $value = $request->session()->flush();
        echo "로그아웃";
    }
  }
