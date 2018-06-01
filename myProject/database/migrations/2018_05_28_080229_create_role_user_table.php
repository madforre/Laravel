<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');

            // users 테이블에 대한 참조키
            $table->integer('user_id')->unsigned(); // 유저아이디
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // roles 테이블에 대한 참조키
            $table->integer('role_id')->unsigned(); // 역할아이디(admin,visitor,author 등등)
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            // user_id 컬럼은 유일해야 한다.
            $table->unique(['user_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
