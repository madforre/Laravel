<h1>{{ $title }} {{ $user->name }}</h1>
<hr/>
<p>{{ $body }}</p>
<hr/>
<footer>Mail from {{ config('app.url') }}</footer>

<!-- 블레이드 문법을 통해서 send() 메소드를 통해 
넘겨 받은 데이터들을 바인딩하는 것을 볼 수 있다.  -->
<!-- config(string $key) (== Config::get(string $key)) 함수를 통해 
config/**.php 에 위치한 설정 값을 읽을 수 있다. -->