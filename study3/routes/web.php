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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return 'See you soon~';
});

Route::get('home', [
    'middleware' => 'auth',
    function() {
        return 'Welcome back, ' . Auth::user()->name;
    }
]);

// Authentication routes...
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('posts', function() {

    DB::listen(function ($event) {
        var_dump($event->sql);
        // var_dump($event->bindings);
        // var_dump($event->time);
    });

    // $posts = App\Post::with('user')->get();
    // Eager 로딩. 쿼리 갯수가 N+1에서 2개로 줄었다.

    $posts = App\Post::with('user')->paginate(5);

    return view('posts.index', compact('posts'));
});

//Lazy Eager 로딩

// 가끔 엘로퀀트를 이용한 쿼리를 먼저 만들어 놓고, 
// 나중에 관계를 로드해야 하는 경우가 발생할 수 있다. 
// 예를 들면, 쿼리 하나를 여러 번 재사용할 경우, 앞에서는 Eager 
// 로딩이 필요없었지만, 나중에 필요하게 되는 경우 등이 해당된다. 
// 이때는 load(string|array $relations) 메소드를 이용할 수 있다.

// Route::get('posts2', function() {

//     DB::listen(function ($event) {
//         var_dump($event->sql);
//         // var_dump($event->bindings);
//         // var_dump($event->time);
//     });

//     $posts = App\Post::get();
//     $posts->load('user');

//     return view('posts.index', compact('posts'));
// });

Route::get('mail', function(){
    $to = 'madforre@gmail.com';
    $subject = 'Studying sending email in Laravel';
    $data = [
        'title' => 'Hi there',
        'body' => 'This is the body of an email message',
        'user' => App\User::find(1)
    ];

    return Mail::send('emails.welcome', $data, function($message) use($to, $subject) {
        $message->to($to)->subject($subject);
    });
});