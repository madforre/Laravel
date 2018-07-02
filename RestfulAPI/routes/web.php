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


// 중복된 Route의 경우, 항상 위에 정의된 것이 아래에 정의된 것을 오버라이드 한다. 가령 posts/count 라는 Route가 있다면 RESTful Resource 정의보다 먼저(== 위에) 정의하는게 안전하다.
Route::get('posts/count', function() {
    return view('sub');
});


// Route에 이름 주기(두번째 인자로 배열 사용)
Route::get('posts', [ // 배열의 키로 'as'를 사용하여 라우트의 이름을 지정한다. 
                      // 컨트롤러로의 연결은 'uses' 키를 사용한다.
    'as' => 'posts.index', 
    'uses' => 'PostsController@index'
    // 이제 컨트롤러나 뷰에서 'posts.index'란 이름을 사용할 수 있다. 가령 return redirect(route('posts.index')) 또는 <a href="{{ route('posts.index') }}">목록으로 돌아가기</a>와 같은 식으로 말이다.
]);

//Closure로 쓸 때도 이름을 부여할 수 있다.

//Route::get('posts', [
//    'as' => 'posts.index',
//    function() {
//        return view('posts.index');
//    }
//]);


// 중첩된 리소스 Route를 만들자.

Route::resource('posts.comments', 'PostCommentController');


Route::resource('posts','PostsController'); // 리소스 라우트의 이름

// 사용자 인증

Route::get('auth', function () {
    $credentials = [ // 이해를 돕기 위해 인증에 필요한 정보를 
        // 하드코드로 ($credentials) 박았다.
        // 실전에서는 Request::input('email') 과 같은 식으로 받아야 한다.
        'email'    => 'john@example.com',
        'password' => 'password'
    ];

    if (! Auth::attempt($credentials)) {
        // Auth::attempt() 메소드에 $credentials 를 넘기면,
        // 단순히 true/false만 리턴하는 것이 아니라, 백그라운드에서는 서버에
        // 로그인한 사용자의 세션도 생성한다! 는 것을 기억하자.
        return 'Incorrect username and password combination';
    }

    return redirect('protected');
});

Route::get('auth/logout', function () {
    Auth::logout();

    return 'See you again~';
});

//Route::get('protected', function () {
//    if (! Auth::check()) {
//        return 'Illegal access !!! Get out of here~';
//    } // ErrorException-Trying to get property of non-object 가 발생했을 것이다. 로그인 되지 않았기 때문에 Auth::user() 는 null 이고, null->name은 성립되지 않기 때문에 예외가 발생한 것이다. if 블럭을 사용하지 않고 Null Pointer를 예방하는 방법이 바로 'auth' 미들웨어 이다.
//    
//   
//    return 'Welcome back, ' . Auth::user()->name;
//});

// 'auth' 미들웨어를 사용하도록 app/Http/routes.php 를 수정해 보자.
// null 포인터 예방방법 성공! 정상적으로 출력된다. Null Pointer가 예방되었다.
// 미들웨어를 통하면 예외발생 x
Route::get('protected', [
    'middleware' => 'auth',
    function () {
        return 'Welcome back, ' . Auth::user()->name;
    }
]); 

Route::get('auth/login', function() {
    return "You've reached to the login page~";
});
