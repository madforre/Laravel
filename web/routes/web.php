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
          // 라라벨에서 @는 컨트롤러클래스 내 메소드 접근자이다.

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

Route::get('/php/variable', 'PHPController@testVariable'); // 변수 실습

Route::get('/php/function', 'PHPController@testFunction'); // 함수 실습

Route::get('/php/array', 'PHPController@testArray'); // 배열 실습

Route::get('/php/control', 'PHPController@testControl'); // 제어문 실습

Route::get('/php/loop', 'PHPController@testLoop'); // 반복문 실습

Route::get('/test/view-route', function()
{ // 뷰실습
    return view('test.message', ['message' => 'Routes/이름.php 에서 직접 수행']);
});

Route::get('/test/view-test/board', 'TestController@sendData');

// 아래는 템플릿 실습

Route::get('/layout/home', function()
{
    return View::make('pages.home'); // 라라벨에서 점은 폴더내 파일 접근자이다.
});

Route::get('/layout/about', function()
{
    return View::make('pages.about');
});

// 아래는 Request 실습

Route::get('/test/request-view' , function()
{
    return View::make('test.request');
});

Route::get('/test/request-view', function()
{
    return View::make('test.request');
});

Route::get('/test/request', 'TestController@testRequest');

// 아래부터 세션 실습

Route::get('/test/session/put', 'TestController@storeSession');
Route::get('/test/session/get', 'TestController@getSession');
Route::get('/test/session/flush', 'TestController@flushSession');

Route::get('/db/basic', 'DBController@basicQuery'); // DB 기본

Route::get('/db/query', 'DBController@queryBulider'); // 쿼리 빌더
