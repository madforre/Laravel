@extends('layouts.app')

@section('content')
  <div class="page-header">
    ...
  </div>

  <div class="container__forum">
    <form action="{{ route('articles.update', $article->id) }}" method="POST" role="form" class="form__forum">
      {!! csrf_field() !!}
      {!! method_field('PUT') !!} 
      <!-- 메소드 오버라이드를 위한 숨김 필드? 를 생성해줌 -->

      @include('articles.partial.form')

      <div class="form-group">
        <p class="text-center">
          <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default">
            {!! icon('reset') !!} Reset
          </a>
          <button type="submit" class="btn btn-primary">
            {!! icon('plane') !!} Edit
          </button>
        </p>
      </div>
    </form>
  </div>
@stop