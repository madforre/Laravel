@extends('board.layout.default')
@section('title')
    로그인
@stop
@section('content')
    <div>
        <form action="login" class="form-signin" method="post">
            <h2>ABCD 로그인</h2>
            <input type="email" name="email" class="form-control" placeholder="이메일" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="비밀번호" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@stop