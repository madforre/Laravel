<p>Index</p>
<!-- 데이터를 바인딩 했음 -->
    {{ $greeting }}    
    
<!--  카운트 함수 자체가 실행안됨 즉 주석 그 자체-->
    {{-- count(range(1,10)) --}}
    
<!-- 실행됨 -->
    {{ count(range(1,10)) }} 
    
<!-- 개발자 도구에 주석으로 보임 -->
<!-- {{ count(range(1,10)) }} -->
    
<!-- foreach 블레이드 문법을 사용해 보자 (for도 사용 가능) -->
<ul>
    @foreach($items as $item)
       <li>{{ $item }}</li>
    @endforeach
</ul>

@if($itemCount = count($items))
    <p>There are {{ $itemCount }} items !</p>
@else <!-- elseif도 당연히 사용가능 -->
    <p>There is no item !</p>
@endif

변수 $items 오버라이드 하기 전 forelse 사용
( forelse 는 if 와 foreach 의 결합이다.)
>>> 변수에 값이 있고 ArrayAccess 를 할 수 있으면, $forelse를 타고
그렇지 않으면 $empty를 탄다. <<<

@forelse($items as $item)
    <p>The item is {{ $item }}</p>
@empty
    <p>There is no item !</p>
@endforelse

변수 $items 오버라이드 한 후 forelse 사용

<?php $items = ['hi','how','are','you']; // 변수를 오버라이드 했음 @forelse 도 써보자. ?> 
@forelse($items as $item)
    <p>The item is {{ $item }}</p>
@empty
    <p>There is no item !</p>
@endforelse

<?php $items =[] ; // 변수에 값이 없는 경우 empty를 탄다.?>

변수에 값이 없는 경우(null 인 경우) empty를 탄다.
@forelse($items as $item)
    <p>The item is {{ $item }}</p>
@empty
    <p>There is no item !</p>
@endforelse
