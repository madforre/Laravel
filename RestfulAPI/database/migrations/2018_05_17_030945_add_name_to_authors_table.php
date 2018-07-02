<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// 코드 내에 두 군데 이상 같은 클래스가 쓰인다면 use 키워드로 import 해 주어야 한다.

class AddNameToAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function(Blueprint $table) {
            $table->string('name')->after('id')->nullable();
            // nullable()은 NULL 을 허용한다는 얘기
            
            // 테이블을 새로 생성할 때 쓰던 create()가 아니라, 이미 만들어진
            // 테이블에 스키마를 변경하는 것이라 table() 메소드를 쓴 것이다.
            // 이 역시 Facade의 메소드 이용
            
            // after() 는 mySQL에서만 쓸 수 있는 메소드로 인자로 넘겨 받은
            // 필드 다음에 새로운 필드를 추가해 준다.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function(Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}