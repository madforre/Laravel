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

// Route 정의에서는
// 사용자 등록, 로그인/아웃, 비밀번호 초기화, 홈페이지, 로그인 후 이동할 페이지 등에서
// 사용할 앤드포인트를 먼저 만든다.

// 데이터 바인딩



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');