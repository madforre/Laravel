<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PHPController extends Controller
{
    public function testVariable()
    {

      $var_string = "문자타입";
      echo $var_string;
      echo '<br/>';

      echo '문자열 연결 ' . $var_string;
      echo '<br/>';

      $var_integer = 10000;
      echo $var_integer;
      echo '<br/>';

      echo '연산 <br/>';
      $result1 = $var_integer + 100;
      $result2 = $var_integer - 100;
      $result3 = $var_integer * 100;
      $result4 = $var_integer / 100;
      echo $result1;
      echo '<br/>';
      echo $result2;
      echo '<br/>';
      echo $result3;
      echo '<br/>';
      echo $result4;
      echo '<br/>';

      $var_float = 1.5;
      echo $var_float;
      echo '<br/>';

      echo '연산 <br/>';
      $result1 = $var_float / 1.5;
      echo $result1;
      echo '<br/>';

      $var_boolean = true;
      echo $var_boolean ? '참' : '거짓';
      echo '<br/>';
    }

    public function testFunction()
    {
        echo add(5, 10); // 헬퍼
          // 헬퍼등록 후 어떤 곳에서도 접근 add() 함수에 접근 가능
    }

    public function testArray()
    {
      $array = array(
        // 배열에는 값을 담을 수 있는 변수가 여러개 모여있음.
          "key1" => "a",
          "key2" => "b",
          "key3" => "c",
          "key4" => "d"
      );
      foreach ($array as $value) {
        echo $value;
      }
    }

    public function testControl() { // 제어문 : 각각의 조건에 맞게 분기 실행
        $a = 1;
        $b = 2;

        if ($a < $b) {
          echo $b . "가 큽니다. <br/>";
        }

        $c = "abc";
        $d = "bcd";
        if ($c != $d) {
          echo "같지 않습니다. <br/>";
        }

        $c = "abc";
        $d = "abc";
        if ($c == $d) {
          echo "같습니다. <br/>";
        }

        if ($c != $d) {
          echo "같지 않습니다. <br/>";
        } else if ($c == $d) {
          echo "같습니다. <br/>";
        }
    }

    public function testLoop(){
        for ($i =1; $i <10; $i++){
          echo $i;
        };

        echo "<br/>";
        $array = array(
          // 배열에는 값을 담을 수 있는 변수가 여러개 모여있음.
            "key1" => "a",
            "key2" => "b",
            "key3" => "c",
            "key4" => "d"
        );
        foreach ($array as $item)
          // 루프를 돕니다.
          /*
          잘
          도
          나
          요
          ?
          */
          echo $item;
    }
}