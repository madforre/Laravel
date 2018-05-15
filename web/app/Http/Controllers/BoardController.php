<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Illuminate\Http\Request 인스턴스는 어플리케이션의 HTTP request를 검사할 수 있는 다양한 메소드를 제공합니다. 라라벨의 Illuminate\Http\Request는 Symfony\Component\HttpFoundation\Request 클래스를 상속합니다. 
use App\BoardContents;
use App\BoardUser;

class BoardController extends Controller
{
    public function loginForm() {
        return view('board.contents.login');
    }
    // 로그인
    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        
        $user = BoardUser::whereRaw('email = ? and password = password(?)', [$email, $password]);
        
        if ( $user->count() > 0) { // 로그인 성공
            $request->session()->put('login',true);
            $request->session()->put('user_id', $user->get()[0]->id);
            $request->session()->put('user_name', $user->get()[0]->name);
            return redirect('/list');
        } else { // 로그인 실패
            return redirect('/login-form');
        }
    }
    // 게시물 등록
    public function addForm() {
        return view('board.contents.add');
    }
    
    public function add(Request $request) {
        $title = $request->input('title');
        $contents = $request->input('contents');
        
        $boardContents = new BoardContents();
        $boardContents->title = $title;
        $boardContents->contents = $contents;
        $boardContents->reg_user_id = $request->session()->get('user_id');
        $boardContents->reg_user_name = $request->session()->get('user_name');
        $boardContents->save();
        
        return redirect('/list');
    }
    // 게시물 목록
    public function listView() {
        // 페이지네이션 사용
        $contents = BoardContents::orderBy('id', 'desc')->paginate(10);
        $contents->setPath('/list');
        return view('board.contents.list')->with('contents', $contents);
    }
    // 게시물 수정
    public function editForm(Request $request) {
        $pageid = $request->input('pageid');
        $boardContents = BoardContents::find($pageid);
        return view('board.contents.edit')->with('contents', $boardContents)->with('pageid', $pageid);
    }
    
    public function edit(Request $request) {
        $pageid = $request->input('pageid');
        $title = $request->input('title');
        $contents = $request->input('contents');
        
        $boardContents = BoardContents::find($pageid);
        $boardContents->title = $title;
        $boardContents->contents = $contents;
        $boardContents->save();
        
        return redirect('/view?pageid=' .$pageid);
    }
    //게시물 삭제
    public function delete(Request $request) {
        $pageid = $request->input('pageid');
        $boardContents = BoardContents::whereRaw('id = ?', [$pageid]);
        $boardContents->delete();
        return redirect('/list');
    }
    // 로그아웃
    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/list');
    }
    // 게시물 보기
    public function view(Request $request) {
        $pageid = $request->input('pageid');
        BoardContents::whereRaw('id =?', [$pageid])->increment('view_count');
        $contents = BoardContents::find($pageid);
        return view('board.contents.view')->with('contents', $contents)->with('pageid', $pageid);
    }
}
