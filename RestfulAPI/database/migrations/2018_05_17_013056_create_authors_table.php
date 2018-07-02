<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 콜백은 $table이란 Blueprint 인스턴스를 주입하며, string(), text(), integer(), timestamp()등 데이터베이스의 데이터 타입에 해당하는 다양한 메소드를 제공한다.
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id'); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('title', 100); // title VARCHAR(100)
            $table->text('body'); // body TEXT
            $table->timestamps(); // created_at TIMESTAMP, updated_at TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors'); // DROP TABLE posts
    }
}
