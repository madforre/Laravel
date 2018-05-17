@extends('board.layout.default')
@section('title')
    등록
@stop
@section('content')
    <div class="page-header">
        <h1>ABCD <small>ABout CoDing</small></h1>
    </div>
    <form action="/add" id="addForm" method="post">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="제목을 입력하세요. " required autofocus>
        </div>
        <div class="form-group">
            <textarea name="contents" class="form-control" rows="5" required></textarea>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <!--        POST 전달에 사용되는 토큰 Post form 에 히든으로 위치해야함!! 
                    없으면 서버 전송시 에러 발생                           -->        
        <div class="vertical-align">
            <div class="col-md-11 text-right">
                <button class="btn btn-primary" type="submit">등록</button>
            </div>
            <div class="col-md-1 text-left">
                <button class="btn btn-default" id="listBtn" type="button">목록</button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $("#listBtn").click(function(){
                location.href = "/list";
            });
        });
    </script>
@stop