<!-- resources/views/articles/show.blade.php -->

@extends('layouts.app')

@section('content')
  <div class="page-header">
    ...
  </div>

  <div class="row container__forum">
    <div class="col-md-3 sidebar__forum">
      <aside>
        @include('layouts.partial.search')
        @include('tags.partial.index')
      </aside>
    </div>

    <div class="col-md-9">
      <article>
        @include('articles.partial.article', ['article' => $article])

        <p>
          {!! $article->content !!}
          <!-- 중괄호!! markdown($article->content) !!중괄호 -->
        </p>
      </article>
      ...
      <article>
        Comment here
      </article>
    </div>
  </div>
@stop