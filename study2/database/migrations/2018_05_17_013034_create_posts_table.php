<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// 라라벨에서는 데이터베이스 스키마를 코드로 생성하기 위한 Blueprint 클래스를 제공하고 있다. 
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // 마이그레이션 실행할 때 동작하는 메소드
        // $ php artisan migrate
    {
        Schema::create('posts', function (Blueprint $table) {
            // Schema는 Facade의 create() 메소드를 이용
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // 마이그레이션을 롤백 하기 위한 메소드
        // $ php artisan migrate:rollback
    {
        Schema::dropIfExists('posts');
    }
}
