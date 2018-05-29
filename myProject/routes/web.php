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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// named route
// ->name() 메서드 체인을 통해 추후 route() 함수를 통해서 
// URL 또는 리다이렉션을 생성할 때 경로이름을 사용 가능하게 해준다.
$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::resource('articles', 'ArticlesController');