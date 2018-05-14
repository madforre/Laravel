@extends('board.layout.default')
@section('title')
    목록
@stop
@section('content')
    <div class="page-header">
        <h1>ABCD <small>ABout CoDing</small></h1>
    </div>
    
    <div class="panel panel-default">
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-6">제목</th>
                    <th class="col-md-2">작성자</th>
                    <th class="col-md-2">작성일</th>
                    <th class="col-md-1">조회수</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $item)
                    <tr>
                        <th scope="row">{{_$item->id}}</th>
                        <td><a href="/view?pageid={{ $item->id }}">{{ $item->title }}</a></td>
                        <td>{{ $item->reg_user_name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->view_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="vertical-align">
        <div class="col-md-8">
            <?php echo $contents->render(); // 페이지네이션 생성 ?>
        </div>
    </div>
    
    <div class="col-md-3 text-right">
        @if (Session::has('login')) <!-- 세션이 있을때만 실행 -->
            <button type="button" id="addFormBtn" class="btn btn-default btn-primary">등록</button>
        @else
    </div>
    <div class="col-md-1 btn-group text-right">
        <button class="btn btn-default" id="loginFormBtn" type="button">
            로그인
        </button>
        @endif
    </div>
    <script>
        $(document).ready(function(){
            $("#addFormBtn").click(function(){
                location.href = "/add-form";
            });
            
            $("#loginFormBtn").click(function(){
                location.href = "/login-form";
            });
            
            $("#logoutBtn").click(function(){
                location.href = "/logout";
            });
        });
    </script>
</script>
@stop