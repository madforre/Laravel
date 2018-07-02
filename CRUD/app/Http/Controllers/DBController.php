<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    public function basicQuery() { // DB 기본
        $users = DB::select('SELECT * FROM abcd_user WHERE id = ?', [1]);
        echo $users[0]->name."<br>";
        
        $users = DB::select('SELECT * FROM abcd_user WHERE id = :id', ['id' => 6]);
        echo $users[0]->name;
        
//        DB::insert('INSERT INTO abcd_user (id, name, title, gender)
//                    VALUES (?, ?, ?, ?)', [4, '둘리', '주인공', '남']);
//        
        DB::update('UPDATE abcd_user SET gender = \'여자\' WHERE ID = ?', ['4']);
    }
    
    public function queryBulider() { // 쿼리 빌더
        $users = DB::table('abcd_user')->get();
        echo $users[5]->name; // 겟만 풀면 깨지는데 객체의 밸류를 지정해주면 안깨지네?
        echo '<br/>';
        
        // 하나의 컬럼만 가져오기 value를 쓰도록 하자.
        $name = DB::table('abcd_user')->where('id','6')->value('name');
        //** 쿼리빌더의 메소드 사용시 한글이 깨지는 이유는??? ->get() 해보면 한글만 다깨진다.
        // value써주면 안깨지네
        echo $name; 
        echo '<br/>'; // where 메소드의 첫번째 파라미터는 키, 두번째 파라미터는 밸류인듯
        // where() 은 컬렉션 안의 값을 조회할 떄 키/값 쌍을 이용하여 필터링 할 수 있습니다.
        
        // 테이블에서 하나의 결과(row) 가져오기
        $name = DB::table('abcd_user')->where('id','6')->first();
        
        echo $name->id;
        echo '<br/>';
        
        // 하나의 컬럼의 데이터
        $roles = DB::table('abcd_user')->pluck('title'); // 뭐야 이건 안깨지네?
        foreach ($roles as $role) {
            echo $role;
            echo '<br/>';
        }
        
        // 중복제거
        $users = DB::table('abcd_user')->distinct()->get();
        // distinct 메소드는 쿼리가 고유한 결과를 반환하도록 강제할 수 있습니다:
        echo count($users)."개";
        echo '<br/>';
        
        // 별명
        $users = DB::table('abcd_user')->select('name as user_name')->get();
        echo $users[0]->user_name;
        echo '<br/>';
        
        // 조건
        $users = DB::table('abcd_user')->where('id','<', 2)->get();
        foreach ($users as $user) {
            echo $user->name;
            echo '<br/>';
        }
        
        // or
        $users = DB::table('abcd_user')
            ->where('id', '<', 2)
            ->orWhere('name', '둘리')
            ->get();
        foreach ($users as $user) {
            echo $user->name." or 문";
            echo '<br/>';
        }        
        echo '<br/>';
        // 3번째까지 스킵하고 그다음부터 5개만큼 가져온다.
        $users = DB::table('abcd_user')->skip(3)->take(5)->get();
        foreach ($users as $user) {
            echo $user->name;
            echo '<br/>';
        }
    }
}