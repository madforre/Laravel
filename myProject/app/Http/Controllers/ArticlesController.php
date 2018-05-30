<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

// index()와 show() 메소드, 즉 포럼 목록 보기와 
// 개별 포럼 상세 보기만 guest 에게 허용할 것이다. 
// 그리고, 사이드바에 모든 태그 목록을 뿌리기 위해, 
// $allTags 란 변수를 포럼을 위한 모든 뷰에 공유할 것이다.

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        view()->share('allTags', \App\Tag::with('articles')->get());
        // parent::__construct(); 컨트롤러.php에 생성자가 있다면 써준다.
        // 생성자 중복을 방지함. 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // with 메소드를 사용하여 Eager Loding 으로 comments, author, tags
        // 관계를 포함한다.
        $articles = Article::with('comments', 'author', 'tags')->latest()->paginate(10);
        // view에 변수를 전달합니다. 
        // compact 는 변수와 그 값을 가지는 배열을 만들어 줍니다.
        // compact('articles') 대신 ['articles'=>$articles] 구문으로
        // 직접 배열을 만들어 주어도 같은 결과를 얻을 수 있습니다.
        // 또는 view의 with 메소드를 사용하여 배열을 생성할 수도 있습니다.
        return view('articles.index', compact('articles'));

        // view의 with 메소드 사용하여 배열 생성하는 방법( 주로 선호됨 )
        // + 여러개의 변수를 뷰에 전달하기 (메소드 체이닝 사용하여 with 여러번 호출)
        // ex) return view('task.view')->with('users', $users)
        //                             ->with('account', $account)
        //                             ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('comments', 'author', 'tags')->findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
