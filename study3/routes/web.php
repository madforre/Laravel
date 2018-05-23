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

// 예외 던지기
Route::get('/throw', function() {
    throw new Exception('Some bad thing happened 뭔가 나쁜일이 생겼어');
});

// ModelNotFoundException 발생
Route::get('/', function() {
    return App\Post::findOrFail(100);
});

//Route::get('/', function() {
//    return 'See you soon~';
//});

// Markdown 기능 추가패키지 - parsedown-extra 써보기
// 입력 문자열로 긴 스트림을 쓰기 위해서 Heredoc 문법을 사용하였다.
Route::get('/extra', function() {
    $text =<<<EOT
**Note** To make lists look nice, you can wrap items with hanging indents:

    -   Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
        Aliquam hendrerit mi posuere lectus. Vestibulum enim wisi,
        viverra nec, fringilla in, laoreet vitae, risus.
    -   Donec sit amet nisl. Aliquam semper ipsum sit amet velit.
        Suspendisse id sem consectetuer libero luctus adipiscing.
EOT;

    return app(ParsedownExtra::class)->text($text);
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

//Route::get('posts', function() {
//
//    DB::listen(function ($event) {
//        var_dump($event->sql);
//        // var_dump($event->bindings);
//        // var_dump($event->time);
//    });
//
//    // $posts = App\Post::with('user')->get();
//    // Eager 로딩. 쿼리 갯수가 N+1에서 2개로 줄었다.
//
//    $posts = App\Post::with('user')->paginate(5);
//
//    return view('posts.index', compact('posts'));
//});

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

// 사용자가 로그인 하면 users 테이블의 last_login 필드에 
// 로그인 시간을 업데이트한다고 가정

Route::get('auth', function () {
    $credentials = [
        'email'    => 'john@example.com',
        'password' => '1234'
    ];

    if (! Auth::attempt($credentials)) {
        return 'Incorrect username and password combination';
    }

    Event::fire('user.login', [Auth::user()]); // 이벤트를 던짐

    var_dump('Event fired and continue to next line...');

    return;
});

Event::listen('user.login', function($user) { // 이벤트를 받음
//    var_dump('"user.log" event catched and passed data is:');
//    var_dump($user->toArray());
    
   // 로그인 시각을 저장
   $user->last_login = (new DateTime)->format('Y-m-d H:i:s');

    return $user->save();
});
// 다양한 폼 유효성 검사 방법

// 1. Validator 인스턴스를 직접 만드는 방법

//Route::post('posts', function(\Illuminate\Http\Request $request) {
//    $rule = [
//        'title' => ['required'], // == 'title' => 'required'
//        'body' => ['required', 'min:10'] // == 'body' => 'required|min:10'
//    ];
//
//    $validator = Validator::make($request->all(), $rule);
//
//    if ($validator->fails()) {
//        return redirect('posts/create')->withErrors($validator)->withInput();
//    }
//
//    return 'Valid & proceed to next job ~';
//});
//
//Route::get('posts/create', function() {
//    return view('posts.create');
//});

// 2. 컨트롤러에서 기본으로 사용할 수 있는 validate() 메소드를 이용하는 방법

Route::resource('posts', 'PostsController');

// Document 모델 동작 테스트

// 여기서 file을 'Route 파라미터' 라고 한다. 올드스쿨식으로 표현하자면 docs?file= 과 같다고 보면 된다.
// 파라미터는 중괄호로 감싼다.
Route::get('docu/{file?}', function($file = null) {
    $text = (new \App\Document)->get($file);
    // 파라미터로 받은 $file을 바로 뒤 콜백에 인자로 넘긴 것이 보일 것이다. 
    // 물음표는 file 파라미터가 있을 수도 있고 없을 수도 있다는 의미이다. 
    // 즉, docs, docs/any-text 를 모두 이 Route에서 처리한다는 의미이다.    
    return app(ParsedownExtra::class)->text($text);
});

