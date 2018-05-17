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
    return view('welcome'); // 익명함수, Closure에서 반환된 값이 Http 응답으로 전달된다.
});

Route::get('/hello', function () {
    return "hello world"; // view(''); 가 아니라 스트링을 반환하면 브라우저에 스트링이 출력된다.
});

//Route::get('/', function(){
//    return view('errors.503'); // resources/views/errors/503.blade.php와 같이 
//                               // 하위 뷰를 응답하려면 하위 디렉토리 구분자인 '.' 또는 '/' 으로 구분한다.
//});

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

// Board

Route::get('/login-form', 'BoardController@loginForm');
Route::post('/login', 'BoardController@login');
Route::get('/logout', 'BoardController@logout');
Route::get('/add-form', 'BoardController@addForm');
Route::post('/add', 'BoardController@add');
Route::get('/edit-form', 'BoardController@editForm');
Route::post('/edit', 'BoardController@edit');
Route::get('/delete', 'BoardController@delete');
Route::get('/list', 'BoardController@listView');
Route::get('/view', 'BoardController@view');

// with 메쏘드로 뷰에 데이터 바인딩하는 방법

Route::get('/bind', function(){
    $greeting = 'Hello';
    
    return view('index')->with('greeting', $greeting);
});

// with 메쏘드로 한 개 이상의 데이터를 넘기는 방법

Route::get('/bind1', function (){
    return view('index')->with([
        'greeting' => 'Good morning ^^/',
        'name'     => '한글'
    ]);
});

// view()의 2번째 인자로 데이터를 넘기는 방법

Route::get('/bind2', function () {
    return view('index', [
        'greeting' => 'Ola~',
        'name'     => 'Laravelians 한글'
    ]);
});

// view 인스턴스의 Property를 이용하는 방법

Route::get('/bind3', function () {
    $view = view('index');
    $view->greeting = "Hey~ What's up";
    $view->name = 'everyone 모두들! ';
    
    return $view;
});

