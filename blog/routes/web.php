<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 세션상태, CSRF 보호, 쿠키 암호화 기능 제공
// RESTful API를 제공하지 않는다면, 대부분의 라우트는 web.php 파일안에 정의될 것입니다.