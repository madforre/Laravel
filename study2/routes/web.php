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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'IndexController@index'); // HTTP GET / 요청이 들어오면, 
// IndexController의 index() 메소드로 연결시키라는 뜻이다.

Route::get('/hi', 'IndexController@hou');

Route::get('/sub', function () {
    return view('sub');
});