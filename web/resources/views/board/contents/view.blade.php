@extends('board.layout.default')
@section('title')
    {{$contents->title}}
@stop
@section('content')
    <div class="page-header">
        <h1>ABCD <small>ABout CoDing</small></h1>
    </div>
    
   <div class="row vertical-align">
       <div class="col-md-8">
           <h4>{{$contents->title}}</h4>
       </div>
       <div class="col-md-4 text-right">
           <p>작성자 : {{$contents->reg_user_name}} 작성일 : {{$contents->created_at}}</p>
       </div>
   </div>
   <div class="content">
       {{$contents->contents}}
   </div>
   
   <div class="vertical-align">
       <div class="col-md-8"></div>
       <div class="col-md-3 text-right">
           <div class="btn-group" role="group">
               @if (Session::has('login))
                   <button type="button" id="editFormBtn" class="btn btn-default">수정</button>
                   <button type="button" id="delBtn" class="btn btn-default">삭제</button>
                @endif
                <button type="button" id="listBtn" class="btn btn-default">목록</button>
           </div>
        </div>
   
       <div class="col-md-1 btn-group text-right">
            @if (Session::has('login'))
               <button class="btn btn-default" id="logoutBtn" type="button">
                    로그아웃
                </button>
            @else
               <button class="btn btn-default" id="loginFormBtn" type="button">
                   로그인
               </button>
            @endif
       </div>
    </div>
    <script>
        $(document).ready(function(){
            $("editFormBtn").click(function(){
                location.href = "/edit-form?pageid={{$pageid}}";
            });
            $("#delBtn").click(function(){
                location.href = "/delete?pageid={{$pageid}}";
            });
            $("#listBtn").click(function(){
                location.href = "/list";
            })
            $("#loginFormBtn").click(function(){
                location.href = "/login-form";
            })
            $("#logoutBtn").click(function(){
                location.href = "/logout";
            });
        });
    </script>
@stop
   
  