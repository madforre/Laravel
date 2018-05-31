<!-- resources/views/tags/partial/list.blade.php -->

<!-- 'articles/partial/article.blade.php' 에서 넘겨 받은 $tags 변수를 이용하여, 
각 Article 에 연결된 Tag 들의 이름을 뿌려준다. 
링크 href 속성에 '#'로 표시된 부분은 나중에 다시 업데이트할 것이다. -->

@if ($tags->count())
  <span class="text-muted">{!! icon('tags') !!}</span>
  <ul class="tags__forum list-unstyled">
    @foreach ($tags as $tag)
      <li class="label label-default">
        <a href="#">{{ $tag->name }}</a> </li>
    @endforeach
  </ul>
@endif