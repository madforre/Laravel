@extends('board.layout.default')
@section('title')
    수정
@stop
@section('content')
    <div class="page-header">
        <h1>ABCD <small>ABout CoDing</small></h1>
    </div>
    <form action="/edit" id="editForm" method="post">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="제목을 입력하세요." value="{{$contents->title}}" required autofocus>
        </div>
        <div class="form-group">
            <textarea name="contents" class="form-control" rows="5" required>{{$contents->contents}}</textarea>
        </div>
        <input type="hidden" name="pageid" value="{{ $pageid }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="vertical-align">
            <div class="col-md-11 text-right">
                <button class="btn btn-primary" type="submit">수정</button>
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
       