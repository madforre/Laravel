@extends('master')
@include('footer')

@section('style')
  <style>
    body {background: #ccc;}
          
    .footer {position : fixed; width : 100%; height : 10%; 
            background : #cdc; left : 0; bottom : 0;
            font-size : 80px; text-align:center;}
    
  </style>
@stop




@section('content')
  <p>Your content here !!!</p>
@stop

@section('test')
    호우<br>
<p>extends라는 키워드는 index.blade.php가 master.blade.php를 상속한다는 뜻이다.</p>
@stop




@section('script')
  <script>
    alert("Hello Blade~ ^^/");
  </script>
@stop

