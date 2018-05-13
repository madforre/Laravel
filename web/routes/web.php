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

Route::get('/hello', function () {
    return "hello world";
});

Route::get('/welcome/{id}', 'WelcomeController@showHello');

Route::get('/test', 'TestController@getTestPage');
          // 경로 ,  컨트롤러 클래스, 클래스의 메소드

Route::get('/test/middleware', ['middleware' => ['abcd'], function () {
  echo ' 요청 진행 ' ;
}]);

Route::get('/test', ['as' => 'testname', 'uses' =>'TestController@getTestPage']);

Route::get('/test/honaldu', function() {
  return redirect(route('testname'));
});

Route::get('/test/auth/{id}/{pass}', 'TestController@authUser'); //파라미터 전달 실습1

Route::get('/test/view', 'TestController@getViewPage'); // 뷰 실습1

Route::get('/test/view/{message}', 'TestController@viewMessage'); // 데이터 전달 실습
